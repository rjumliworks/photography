<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Traits\HandlesTransaction;
use App\Services\Files\SaveClass;
use App\Services\Files\UpdateClass;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;

class FileController extends Controller
{
    use HandlesTransaction;

    public $save, $update;

    public function __construct(SaveClass $save, UpdateClass $update){
        $this->save = $save;
        $this->update = $update;
    }

    public function index(Request $request){
        switch($request->option){
            case 'download':
                return $this->update->download($request);
            break;
        }
    }

    public function store(FileRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->save->file($request);
        });

        if($result['data'] == 'kradwashere!@#$%'){
            return response()->json([
                'message' => 'Storage limit exceeded. Please upgrade your plan.',
            ], 422);
        }else{
            return response()->json([
                'file' => $result['data'], // FolderFile model
                'message' => $result['message'],
                'info' => $result['info']
            ]);
        }
    }

    public function update(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'comment':
                    return $this->update->comment($request);
                break;
                case 'rename':
                    return $this->update->rename($request);
                break;
                case 'softdelete':
                    return $this->update->delete($request);
                break;
                case 'like':
                    return $this->update->like($request);
                break;
                case 'unlike':
                    return $this->update->unlike($request);
                break;
            }
        });
        
        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }

    public function destroy(Request $request){
       
    }
}
