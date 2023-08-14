<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function structure()
    {
        return view('about.structure', [
            'title' => "Struktur Organisasi",
        ]);
    }
    public function apbd()
    {
        return view('about.apbd', [
            'title' => "Transparansi APBDesa",
        ]);
    }
    public function vision()
    {
        return view('about.vision', [
            'title' => "Visi dan Misi",
        ]);
    }
    public function destination()
    {
        return view('about.destination', [
            'title' => "Tempat Wisata",
        ]);
    }
}
