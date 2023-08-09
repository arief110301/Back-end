<?php

namespace App\Http\Controllers;

use App\Models\File1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class File1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(File1::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateDate = $request->validate([
            'gambar' =>'nullable|mimes:pdf,jpeg,png,docx,docs,xlsx,ppt,pptx',
            'file1' =>'nullable|mimes:pdf,jpeg,png,docx,docs,xlsx,ppt,pptx',
            'file2' => 'nullable|mimes:pdf,jpeg,png,docx,docs,xlsx,ppt,pptx',
            'file3' => 'nullable|mimes:pdf,jpeg,png,docx,docs,xlsx,ppt,pptx',
        ]);

        if ($request->file('gambar')){
            $validateDate['gambar'] = $request->file('gambar')->store('/file1s');
        }
        if ($request->file('file1')){
            $validateDate['file1'] = $request->file('file1')->store('/file1s');
        }
        if ($request->file('file2')){
            $validateDate['file2'] = $request->file('file2')->store('/file1s');
        }
        if ($request->file('file3')){
            $validateDate['file3'] = $request->file('file3')->store('/file1s');
        }
        // $request->file->move(public_path('file1s'), $validateDate);
        File1::create($validateDate);
        return response()->json('sukses');
    }

    /**
     * Display the specified resource.
     */
    public function show(File1 $file1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File1 $file1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File1 $file1)
    {
        $rules = [
            'gambar' =>'nullable|mimes:pdf,jpeg,png,docx,docs,xlsx,ppt,pptx',
            'file1' =>'nullable|mimes:pdf,jpeg,png,docx,docs,xlsx,ppt,pptx',
            'file2' => 'nullable|mimes:pdf,jpeg,png,docx,docs,xlsx,ppt,pptx',
            'file3' => 'nullable|mimes:pdf,jpeg,png,docx,docs,xlsx,ppt,pptx',
        ];

        $validateDate =$request->validate($rules);

        if ($request->file('gambar')){
            if ($request->oldGambar){
                Storage::delete($request->oldGambar);
            }
            $validateDate['gambar'] = $request->file('gambar')->store('/file1s');
        }
        if ($request->file('file1')){
            if ($request->oldFile1){
                Storage::delete($request->oldFile1);
            }
            $validateDate['file1'] = $request->file('file1')->store('/file1s');
        }
        if ($request->file('file2')){
            if ($request->oldFile2){
                Storage::delete($request->oldFile2);
            }
            $validateDate['file2'] = $request->file('file2')->store('/file1s');
        }
        if ($request->file('file3')){
            if ($request->oldFile3){
                Storage::delete($request->oldFile3);
            }
            $validateDate['file3'] = $request->file('file3')->store('/file1s');
        }
        File1::where('id', $file1->id)
        ->update($validateDate);
        return response()->json('sukses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File1 $file1)
    {
        if ($file1->gambar){
            Storage::delete($file1->gambar);
        }
        if ($file1->file1){
            Storage::delete($file1->file1);
        }
        if ($file1->file2){
            Storage::delete($file1->file2);
        }
        if ($file1->file3){
            Storage::delete($file1->file3);
        }
        File1::destroy($file1->id);
        return response()->json('sukses');
    }
    
}
