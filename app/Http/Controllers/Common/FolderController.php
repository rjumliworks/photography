<?php

namespace App\Http\Controllers\Common;

use App\Services\DropdownClass;
use App\Traits\HandlesTransaction;
use App\Services\Folders\SaveClass;
use App\Services\Folders\ViewClass;
use App\Services\Folders\UpdateClass;
use App\Services\Dashboard\PhotographerClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FolderRequest;

class FolderController extends Controller
{
    use HandlesTransaction;

    public $view,$save,$update,$dropdown,$photographer;

    public function __construct(SaveClass $save, ViewClass $view, UpdateClass $update, PhotographerClass $photographer, DropdownClass $dropdown){
        $this->view = $view;
        $this->save = $save;
        $this->update = $update;
        $this->photographer = $photographer;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->view->lists($request);
            break;
            default:
                return inertia('Modules/Photographer/Folders/Index',[
                    'currencies' => $this->dropdown->currencies()
                ]);
        }
    }

    public function store(FolderRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'folder':
                    return $this->save->folder($request);
                break;
                case 'tags':
                    return $this->save->tags($request);
                break;
            }
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }

    public function update(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'folder':
                    return $this->update->folder($request);
                break;
                case 'tags':
                    return $this->update->tags($request);
                break;
            }
        });
        
        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }

    public function show($code){
        return inertia('Modules/Photographer/Folders/View/Index',[
            'folder_data' => $this->view->show($code),
            'used' => $this->view->used(),
            'plan' => $this->photographer->plan(),
        ]);
    }
}
