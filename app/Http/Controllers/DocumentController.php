<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('dashboard.documents.edit', [
            'title' => "Update Data",
            'document' => $document,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        // validasi
        $validatedData = $request->validate([
            'realisasi' => 'image|file|max:10000',
            'transparansi' => 'image|file|max:10000',
            'struktur' => 'image|file|max:10000',
            'visi' => 'image|file|max:10000',
        ]);
        // delete realisasi lama bila ada realisasi baru
        if($request->file('realisasi')){
            if($document->realisasi != "-"){
                $image = $document->realisasi;
                unlink(storage_path('app/public/'.$image));
            }
            $imagePath = $request->file('realisasi')->store('public/document-images');
            $validatedData['realisasi'] = preg_replace('[public/]', '', $imagePath);
        } else{
            $validatedData['realisasi'] = $document->realisasi;
        }
           
        // delete transparansi lama bila ada transparansi baru
        if($request->file('transparansi')){
            if($document->transparansi != "-"){
                $image = $document->transparansi;
                unlink(storage_path('app/public/'.$image));
            }
            $imagePath = $request->file('transparansi')->store('public/document-images');
            $validatedData['transparansi'] = preg_replace('[public/]', '', $imagePath);
        }else{
            $validatedData['transparansi'] = $document->transparansi;
        }

        // delete struktur lama bila ada struktur baru
        if($request->file('struktur')){
            if($document->struktur != "-"){
                $image = $document->struktur;
                unlink(storage_path('app/public/'.$image));
            }
            $imagePath = $request->file('struktur')->store('public/document-images');
            $validatedData['struktur'] = preg_replace('[public/]', '', $imagePath);
        }else{
            $validatedData['struktur'] = $document->struktur;
        }

        // delete visi lama bila ada visi baru
        if($request->file('visi')){
            if($document->visi != "-"){
                $image = $document->visi;
                unlink(storage_path('app/public/'.$image));
            }
            $imagePath = $request->file('visi')->store('public/document-images');
            $validatedData['visi'] = preg_replace('[public/]', '', $imagePath);
        }else{
            $validatedData['visi'] = $document->visi;
        }
        // update row
        Document::where('id', $document->id)->update($validatedData);
        return redirect('/dashboard/documents/1/edit')->with('success', 'Data berhasil di-update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
