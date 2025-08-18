<?php

namespace App\Services\Executive\Users;

use App\Models\User;
use App\Http\Resources\UserResource;

class ViewClass
{
    public function users($request){
        $data = UserResource::collection(
            User::query()
            ->with('profile','myroles.province','myroles.role:id,name,has_lab,is_lab','myroles.laboratory:id,name','myroles.agency:id,name,code')
            ->when($request->keyword, function ($query, $keyword) {
                $query->whereHas('profile',function ($query) use ($keyword) {
                    $query->whereRaw('concat(firstname, " ", lastname) LIKE ?', ['%' . $keyword . '%'])
                    ->orWhereRaw('concat(lastname, " ", firstname) LIKE ?', ['%' . $keyword . '%']);
                })->orWhere(function ($query) use ($keyword) {
                    $query->where('username', 'LIKE', "%{$keyword}%")->whereNotIn('role',['Administrator']);
                });
            })
            ->when($request->agency, function ($query, $agency) {
                $query->whereHas('myroles',function ($query) use ($agency) {
                    $query->where('agency_id',$agency);
                });
            })
            ->when($request->laboratory, function ($query, $laboratory) {
                $query->whereHas('myroles',function ($query) use ($laboratory) {
                    $query->where('laboratory_id',$laboratory); 
                });
            })
            ->when($request->role, function ($query, $type) {
                $query->whereHas('myroles',function ($query) use ($type) {
                    $query->where('role_id',$type);
                });
            })
            ->where('role','Staff')
            ->paginate($request->count)
        );
        return $data;
    }
}
