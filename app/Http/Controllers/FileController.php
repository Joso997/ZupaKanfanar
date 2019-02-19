<?php

namespace Župa\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Session;


class FileController extends Controller
{
    public function getIndex (){
        return view('private.upload');
    }

    public function store(Request $request){

        $file = $request->file('file');

        //$file->storeAs('public_uploads', 'test');

        if(!Storage::disk('public_upload')->put('', $file)) {
            return false;
        }else{
            Session::flash('success', ' Novi Raspored je Uspješno Dodan');
            return redirect('/');
        }
    }
}
