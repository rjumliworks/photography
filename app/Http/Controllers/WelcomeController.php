<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\DropdownClass;
use App\Traits\HandlesTransaction;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class WelcomeController extends Controller
{
    use HandlesTransaction;

    public $dropdown;
    
    public function __construct(DropdownClass $dropdown)
    {
        $this->dropdown = $dropdown;
    }

    public function index(){
       return inertia('Welcome',[
            'studios' => $this->dropdown->studios(),
            'countries' => $this->dropdown->countries(),
            'plans' => $this->dropdown->plans()
       ]);
    }

    public function store(RegistrationRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            $user = User::create(array_merge($request->all(),[
                    'password' => Hash::make($request->password),
                    'username' => $request->email
                ]));
            if($user) {
                $user->profile()->create($request->all());
                $user->photographer()->create($request->all());
                Auth::login($user);
            }

            return [
                'data' => $user,
                'message' => 'User information updated successfully.',
                'info' => "All relevant fields have been refreshed with the latest data."
            ];
        });

        return redirect()->route('dashboard')->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
