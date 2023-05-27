<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    //


    public function index(){

        $certificates = Certificate::all();

        return view('certificate/index', compact('certificates'));
    }

    public function create(){
        return view('certificate/create');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string',
            'from' => 'required|string',
        ]);


        $imageName = null;
        if ($request->hasFile('file')){
            $imageName = time().'.'.$request->file->extension();

            $request->file->storeAs('certificates/', $imageName, 'public');
        }
        $data = [
            'title' => $request->get('title'),
            'from' => $request->get('from'),
        ];
        if ($imageName)
            $data['file'] = 'images/'.$imageName;
        Certificate::create($data);

        return redirect()->back()->with('success', 'Certificate saved successfully');


    }

    public function show($id){
        $certificate = Certificate::findOrFail($id);

        return view('certificate.show', compact('certificate'));
    }

    public function changeStatus($id, $status){

        Certificate::find($id)->update([
            'status' => $status,
        ]);

        return redirect()->back()->with('success', 'Certificate Status updated successfully');
    }


}
