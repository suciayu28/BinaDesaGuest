<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    public function index()
    {

        $jenisSurats = JenisSurat::with('templates')->get();
        return view('pages.guest.jenis_surat', compact('jenisSurats'));
    }


}
