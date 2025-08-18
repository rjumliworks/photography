<?php

namespace App\Services\Executive\Tsrs;

use Hashids\Hashids;
use Carbon\Carbon;
use App\Models\Wallet;
use App\Models\UserRole;
use App\Models\Tsr;
use App\Models\TsrReport;
use App\Models\TsrPayment;
use App\Models\TsrAnalysis;
use App\Models\WalletTransaction;
use App\Models\AgencyConfiguration;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use App\Http\Resources\Laboratory\Tsr\ListResource;
use App\Http\Resources\Laboratory\Tsr\ViewResource;
use App\Http\Resources\Operation\TsrResource;
use App\Http\Resources\Operation\TsrViewResource;
use App\Http\Resources\Operation\AnalysisResource;

class ViewClass
{
    public function counts($statuses){
        foreach($statuses as $status){
            if ($status['value'] == '2') {
                $counts[] = Tsr::where(function ($query) {
                    $query->where('status_id', 2)
                          ->orWhere(function ($query) {
                              $query->whereIn('status_id', [3, 4])
                                    ->whereHas('payment', function ($query) {
                                        $query->where('status_id', 18);
                                    });
                          });
                })
                ->count();
            } else {
                $counts[] = Tsr::where('status_id',$status['value'])->count();
            }
        }
        return $counts;
    }

    public function lists($request){
        $data = ListResource::collection(
            Tsr::query()
            ->with('customer:id,name_id,name,is_main','customer.customer_name:id,name,has_branches')
            ->with('laboratory:id,name','status:id,name,color,others')
            ->with('payment:tsr_id,id,total,is_paid,is_free,paid_at,status_id,discount_id,collection_id,payment_id','payment.status:id,name,color,others')
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('code', 'LIKE', "%{$keyword}%")
                ->orWhereHas('customer',function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhereHas('customer_name',function ($query) use ($keyword) {
                        $query->where('name', 'LIKE', "%{$keyword}%");
                    });
                });
                
            })
            ->with(['samples' => function ($query){
                $query->select('id','tsr_id');
                $query->withCount([
                    'analyses as analyses_count',
                    'analyses as completed_analyses_count' => function ($query) {
                        $query->where('status_id', 12);
                    },
                    'analyses as ongoing_analyses_count' => function ($query) {
                        $query->where('status_id', 11);
                    }
                ]);
            }])
            
            ->when($request->status, function ($query, $status) {
                if ($status == '2') {
                    $query->where(function ($query) {
                        $query->where('status_id', 2) 
                              ->orWhere(function ($query) {
                                  $query->whereIn('status_id', [3,4]) 
                                        ->whereHas('payment', function ($query) {
                                            $query->where('status_id', 18);
                                        });
                              });
                    });
                } else {
                    $query->where('status_id', $status);
                }
            })
            ->when($request->datetype && $request->date, function ($query) use ($request) {
                $query->whereDate($request->datetype, $request->date);
            })
            ->when($request->laboratory , function ($query, $labtype ) {
                (is_array($labtype)) ?  $query->whereIn('laboratory_id',$labtype ) : $query->where('laboratory_id',$labtype );
            }) 
            ->when($request->sort, function ($query, $sort) use ($request) {
                if($request->sortby == 'Code'){
                    $query->orderBy('code',$request->sort);
                }else if($request->sortby == 'Requested At'){
                    $query->orderBy('created_at',$request->sort);
                }else{
                    $query->orderBy('due_at',$request->sort);
                }
            })
            ->paginate($request->count)
        );
        return $data;
    }

    public function view($id){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($id);

        $data = new ViewResource(
            Tsr::query()
            ->with('samples.report','samples.analyses','samples.analyses.addfee.service','samples.analyses.testservice.testname','samples.analyses.testservice.method.method','samples.analyses.testservice.method.reference','samples.analyses.testservice.fees')
            ->with('services.service')
            ->with('parent')
            ->with('children.child.status')
            ->with('referral.agency.member','referral.province')
            ->with('groups.testservice:id,testname_id,method_id,laboratory_id','groups.testservice.testname:id,name','groups.testservice.laboratory:id,name','groups.status')
            ->with('received:id','received.profile:id,firstname,lastname,user_id')
            ->with('agency','laboratory:id,name','status:id,name,color,others')
            ->with('customer:id,name_id,name,is_main','customer.customer_name:id,name,has_branches','customer.wallet','customer.industry:id,name')
            ->with('customer.address:address,customer_id,region_code,province_code,municipality_code,barangay_code','customer.address.region:code,name,region','customer.address.province:code,name','customer.address.municipality:code,name','customer.address.barangay:code,name','customer.conformes')
            ->with('conforme:id,name,contact_no','customer.contact:id,email,contact_no,customer_id')
            ->with('payment:tsr_id,id,total,subtotal,discount,or_number,is_paid,is_free,has_deduction,paid_at,status_id,discount_id,collection_id,payment_id','payment.status:id,name,color,others','payment.collection:id,name','payment.type:id,name','payment.discounted:id,name,value','payment.deduction')
            ->where('id',$id)->first()
        );
        return $data;
    }

    public function analyses($id){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($id);

        $data = AnalysisResource::collection(
            TsrAnalysis::query()
            ->with('sample','status','analyst','addfee.service')
            ->with('testservice.testname','testservice.method.method','testservice.method.reference','testservice.fees')
            ->whereHas('sample',function ($query) use ($id){
                $query->whereHas('tsr',function ($query) use ($id){
                    $query->where('id',$id);
                });
            })
            ->get()
        );
        return $data;
    }

    public function print($request){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($request->id);

        $tsrinfo = Tsr::where('id',$id)->with('laboratory')->first();
        $tsr = TsrReport::where('tsr_id',$id)->value('information');
        $lab = json_decode($tsr);
        
        $user_id = $tsrinfo->received_by;
        $userrole = UserRole::where('user_id',$user_id)->first();


        $url = $_SERVER['HTTP_HOST'].'/verification/'.$request->id;
        $qrCode = new QrCode($url);
        $qrCode->setSize(300);
        $pngWriter = new PngWriter();
        $qrCodeImageString = $pngWriter->write($qrCode)->getString();
        $base64Image = 'data:image/png;base64,' . base64_encode($qrCodeImageString);
        $wallet = Wallet::where('customer_id',$tsrinfo->customer_id)->value('available');
        $payment = TsrPayment::select('id','total','payment_id')->with('type:id,name')->where('tsr_id',$tsrinfo->id)->first();
        $transaction = WalletTransaction::where('transacable_id',$tsrinfo->id)->where('transacable_type','App\Models\Tsr')->first();
        $array = [
            'qrCodeImage' => $base64Image,
            'configuration' => AgencyConfiguration::with('agency.member')->first(),
            'tsr' => json_decode($tsr),
            'cashier' => '',
            'manager' => '',
            'user' => '',
            'color' => ($tsrinfo->lab_type) ? $tsrinfo->lab_type->color : 'black',
            'wallet' => ($wallet) ?  $wallet : '0.00',
            'payment' => $payment,
            'transaction' => $transaction
        ]; 

        $pdf = \PDF::loadView('reports.tsr',$array)->setPaper('a4', 'portrait');
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
            $copies = 3;
            $totalPagesPerCopy = $pageCount / $copies;
            $currentPageInCopy = ($pageNumber - 1) % $totalPagesPerCopy + 1;
            $text = "PAGE $currentPageInCopy OF $totalPagesPerCopy";
            $font = $fontMetrics->get_font("Helvetica", "normal");
            $size = 7;
            $width = $fontMetrics->get_text_width($text, $font, $size);
            $canvas->text(106 - $width, 796, $text, $font, $size);
        });
        return $pdf->stream($lab->code.'.pdf');
    }
}
