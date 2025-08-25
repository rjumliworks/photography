<?php

namespace App\Services\Folders;

use App\Models\Folder;
use App\Http\Resources\Common\FolderResource;

class UpdateClass
{
    public function folder($request){
        $data = Folder::find($request->id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        $data = Folder::find($request->id);
        return [
            'data' => new FolderResource($data),
            'message' => 'Folder updated successfully!', 
            'info' => "You’ve successfully updated your folder. All changes are now saved."
        ];
    }

    public function tags($request)
    {
        $data = Folder::find($request->id);
        $data->tags()->sync($request->tags);

        return [
            'data' => $data,
            'message' => 'Tags updated successfully!',
            'info' => 'The folder’s tags have been refreshed with your latest selection.'
        ];
    }
}
