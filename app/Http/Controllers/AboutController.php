<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function structure()
    {
        return view('about.structure', [
            'title' => "Struktur Organisasi",
            'document' => Document::first()
        ]);
    }
    public function apbd()
    {
        return view('about.apbd', [
            'title' => "Transparansi APBDesa",
            'document' => Document::first()
        ]);
    }
    public function vision()
    {
        return view('about.vision', [
            'title' => "Visi dan Misi",
            'document' => Document::first()
        ]);
    }
    public function destination()
    {
        return view('about.destination', [
            'title' => "Tempat Wisata",
        ]);
    }
}
