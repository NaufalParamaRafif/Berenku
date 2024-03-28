<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show(){
        return view('home.home',[
            'bukus' => Buku::all(),
        ]);
    }
}
