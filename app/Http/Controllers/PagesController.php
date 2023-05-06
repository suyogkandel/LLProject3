<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function viewnews()
    {
        $news=News::all();
        return view('viewnews', compact('news'));
    }

    public function viewnews2()
    {
        $news=News::all();
        return view('viewnews2', compact('news'));
    }
}
