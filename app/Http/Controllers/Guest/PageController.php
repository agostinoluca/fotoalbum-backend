<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class PageController extends Controller
{
    public function index()
    {
        $featured_photo = Photo::where('evidence', true)->get();
        return view('welcome', compact('featured_photo'));
    }
}
