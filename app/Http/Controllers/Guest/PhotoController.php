<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::orderByDesc('id')->paginate(4);
        return view('guests.photos.index', compact('photos'));
    }

    public function show(Photo $photo)
    {
        return view('guests.photos.show', compact('photo'));
    }
}
