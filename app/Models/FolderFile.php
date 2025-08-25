<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FolderFile extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

    protected $fillable = [
        'name',
        'path',
        'mime_type',
        'size',
        'text',
        'user_id',
        'folder_id',
        'opened_at',
        'meta',
        'kind',
        'status'
    ];

    protected $casts = ['meta' => 'array'];

    public function folder()
    {
        return $this->belongsTo('App\Models\Folder', 'folder_id', 'id');
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
            'path',
            'mime_type',
            'size',
            'text',
            'user_id',
            'folder_id',
            'opened_at',
            'meta',
            'kind'
        ])
        ->setDescriptionForEvent(fn(string $eventName) => "{$eventName}")
        ->useLogName('File')
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }

    public function getOpenedAtAttribute($value)
    {
        return ($value) ? date('F d, Y g:i a', strtotime($value)) : null;
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
