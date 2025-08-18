<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DropdownClass;

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
                return inertia('Modules/Photographer/Dashboard/Index');
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
