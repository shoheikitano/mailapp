<?php

namespace App\Http\Controllers;

use App\Folder;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    //
    public function showCreateForm() {

      return view('folders.create');
    }

    public function create(CreateFolder $request) {

      $folder = new Folder();

      $folder->title = $request->title;

      Auth::user()->folders()->save($folder);

      return redirect()->route('tasks.index', ['id' => $folder->id]);
    }

    public function showDelete(Folder $folder) {

      return view('folders/delete',['folder' => $folder,]);
    }

    public function delete(Folder $folder) {

      $id = $folder->id;

      Auth::user()->folders()->where('id', $id)->delete();

      $first_folder= Auth::user()->folders()->first();

      if($first_folder == null) {

        return view('folders.create');
      } else {

        return redirect()->route('tasks.index', ['id' => $first_folder->id]);

      }

    }

    public function showEditForm(Folder $folder) {

      return view('folders/edit',['folder' => $folder,]);
    }

    public function edit(Folder $folder, CreateFolder $request) {

      $folder->title = $request->title;

      Auth::user()->folders()->save($folder);

      return redirect()->route('tasks.index', ['id' => $folder->id]);
    }
}
