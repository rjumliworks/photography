<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListTag extends Model
{
    public function folders()
    {
        return $this->belongsToMany(Folder::class, 'folder_tag', 'tag_id', 'folder_id')->withTimestamps();
    }
}
