<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Services\DropdownClass;
use App\Http\Resources\Photographer\SubscriptionResource;

class DashboardController extends Controller
{
    public function __construct(
        DropdownClass $dropdown,
    ){
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        if(!\Auth::check()){
            return inertia('Auth/Login');
        }else{
            if(\Auth::user()->role == 'Photographer'){
                return inertia('Modules/Photographer/Dashboard/Index',[
                    'plan' => new SubscriptionResource(Subscription::with('plan.plan')->where('user_id',\Auth::user()->id)->first())
                ]);
            }else if(\Auth::user()->role == 'Client'){

            }else{
                return inertia('Modules/Administrator/Dashboard/Index');
            }
        }
    }


    public function search(Request $request){
        $option = $request->option;
        switch($option){
           
        }
    }
}
