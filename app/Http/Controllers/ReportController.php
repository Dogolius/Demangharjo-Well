<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room', [
            'title' => "Bilik Aduan",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|file|max:5120',
            'body' => 'required'
        ]);

        if($request->file('image')){
            // possible code for production
            // $imagePath = $request->file('image')->store('public/report-images');
            // $validatedData['image'] = preg_replace('[public/]', '', $imagePath);

            // alternatively, you can use Storage facade to get the URL
            $imagePath = $request->file('image')->store('report-images', 'public');
            $validatedData['image'] = preg_replace('[public/]', '', $imagePath);
        }

        $validatedData['reporter_name'] = auth()->user()->name;
        Report::create($validatedData);

        return redirect('/room')->with('success', 'Aduan berhasil disampaikan');
    }
}
