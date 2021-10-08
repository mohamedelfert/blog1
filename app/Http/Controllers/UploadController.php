<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(){
//        $this->validate(\request(),['file.*' => 'required|image|mimes:jpg,jpeg,png']);
//        $files    = \request()->file('file');
//        foreach ($files as $file){
//            $name     = $file->getClientOriginalName();
//            $exe      = $file->getClientOriginalExtension();
//            $size     = $file->getSize();
//            $mime     = $file->getMimeType();
//            $error    = $file->getError();
//            $realPath = $file->getRealPath();
//
//            $newName = 'image' . time() . '.' . $exe;
//
//            $file->move(public_path('uploads') , $newName);
//        }
//        return back();

//        Storage::disk('local')->put('textFile.txt',\request('text'));
//        return Storage::get('textFile.txt');
//        Storage::put('textFile1.txt',\request('text'));
//        Storage::prepend('textFile.txt',\request('text'));
//        Storage::append('textFile1.txt',\request('text'));
//        return date('Y-m-d H:i:s',Storage::lastModified('textFile1.txt'));
        return Storage::url('textFile1.txt');
//        return back();
    }
}
