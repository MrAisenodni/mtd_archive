<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function download(Request $request) 
    {
        // return response()->file(public_path().'/storage/'.$request->file);
        return response()->download(public_path().'/storage/'.$request->file);
    }
}
