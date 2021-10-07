<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(){
        $this->validate(\request(),['file' => 'required|image|mimes:jpg,jpeg,png']);
        $file     = \request()->file('file');
        $name     = $file->getClientOriginalName();
        $exe      = $file->getClientOriginalExtension();
        $size     = $file->getSize();
        $mime     = $file->getMimeType();
        $error    = $file->getError();
        $realPath = $file->getRealPath();

        $newName = 'image' . time() . '.' . $exe;

        return $file->move(public_path('uploads') , $newName);
    }
}
