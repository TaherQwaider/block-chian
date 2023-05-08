<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    //


    public function index(){
        return view('certificate/index');
    }

    public function create(){
        return view('certificate/create');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string',
            'from' => 'required|string',
        ]);


        $filePath = null;
        if ($request->hasFile('file')){
            $imageName = time().'.'.$request->file->extension();

            $request->file->move(public_path('files'), $imageName);
        }
        Certificate::create([
            'title' => $request->get('title'),
            'from' => $request->get('from'),
            'file' => 'images'
        ]);


    }

}
