<?php

namespace App\Services;

use App\Models\Plan;
use App\Models\ListTag;
use App\Models\ListStudio;
use App\Models\ListCountry;
use App\Models\ListCurrency;

class DropdownClass
{  
    public function countries(){
        $data = ListCountry::all()->map(function ($item) {
            return [
                'label' => $item->continent,
                'options' => [
                    'value' => $item->id,
                    'name' => $item->name
                ]
            ];
        });
        $grouped = $data->groupBy('label')->map(function ($items) {
            return [
                'label' => $items->first()['label'],
                'options' => $items->pluck('options')->values()
            ];
        })->values();

        return $grouped;
    }

    public function studios(){
        $data = ListStudio::all()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function currencies(){
        $data = ListCurrency::all()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->code.' ('.$item->name.')'
            ];
        });
        return $data;
    }

    public function plans(){
        $data = Plan::with([
            'pricings.currency' => function($q) {
                $q->select('id', 'code', 'symbol', 'name');
            }
        ])->where('is_active',1)->where('is_trial',0)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'icon' => $item->icon,
                'description' => $item->description,
                'storage_size' => $item->storage_size,
                'storage_unit' => $item->storage_unit,
                'folders_limit' => $item->folders_limit,
                'features' => $item->features,
                'pricings' => $item->pricings
            ];
        });
        return $data;
    }

    public function tags($keyword){
        $data =  ListTag::when($keyword, function ($query) use ($keyword){
            $query->where('name', 'like', '%' . $keyword . '%');
        })
        ->limit(5)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    // public function dropdowns($class,$type = null){
    //     $data = ListDropdown::where('classification',$class)
    //     ->when($type, function ($query) use ($type){
    //         $query->where('type',$type);
    //     })
    //     ->get()->map(function ($item) {
    //         return [
    //             'value' => $item->id,
    //             'name' => $item->name
    //         ];
    //     });
    //     return $data;
    // }
}
