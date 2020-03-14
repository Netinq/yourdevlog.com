<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function devlog()
    {
        $data_url = Config::where('name', 'devlog')->first();
        $data_url = $data_url->value_str;
        return view('devlog', compact('data_url'));
    }
}
