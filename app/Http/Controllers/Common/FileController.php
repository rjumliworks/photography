<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Traits\HandlesTransaction;
use App\Services\Files\SaveClass;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;

class FileController extends Controller
{
    use HandlesTransaction;

    public $save;

    public function __construct(SaveClass $save){
        $this->save = $save;
    }

    public function store(FileRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->save->file($request);
        });

        if($result['data'] == 'kradwashere!@#$%'){
            return response()->json([
                'message' => 'Storage limit exceeded. Please upgrade your plan.',
            ], 422);
        }else{
            return response()->json([
                'file' => $result['data'], // FolderFile model
                'message' => $result['message'],
                'info' => $result['info']
            ]);
        }
    }
}
