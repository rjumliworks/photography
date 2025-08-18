<?php

namespace App\Services\Executive\Users;

use App\Models\User;
use App\Models\LocationProvince;
use App\Http\Resources\UserResource;
use App\Jobs\MailJob;

class SaveClass
{
    public function store($request){
        $data = User::create(array_merge($request->all(), ['password' => bcrypt('dost6!@#$%'),'is_new' => 1 ,'role' => 'Staff','avatar' =>'avatar.jpg']));
        $data->profile()->create($request->all());
        $data->myroles()->create($request->all());
        MailJob::dispatch($data);
        return [
            'data' => new UserResource($data),
            'message' => 'User creation was successful!', 
            'info' => "You've successfully created an account for the user."
        ];
    }

    public function update($request){
        $data = User::with('profile')->where('id',$request->id)->first();
        $data->update($request->all());

        return [
            'data' => new UserResource($data),
            'message' => 'User update was successful!', 
            'info' => "You've successfully updated the selected user."
        ];
    }
}
