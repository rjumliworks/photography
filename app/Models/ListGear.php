<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;

class ListGear extends Model
{   
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'description',
        'brand_id',
        'type_id'
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\ListName', 'type_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\ListName', 'brand_id', 'id');
    }

    public function updateIfDirty(array $attributes){
        $this->fill($attributes);
        $dirtyAttributes = $this->getDirty();
        if(!empty($dirtyAttributes)) {
            $originalAttributes = array_intersect_key($this->getOriginal(), $dirtyAttributes);
            $updated = $this->update($dirtyAttributes);
            return $updated;
        }
        return false;
    }

    public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults()
        ->logOnly([
            'name',
            'description',
            'brand_id',
            'type_id'
        ])
        ->setDescriptionForEvent(fn(string $eventName) => "{$eventName}")
        ->useLogName('Specialization')
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('F d, Y g:i a', strtotime($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return date('F d, Y g:i a', strtotime($value));
    }
}
