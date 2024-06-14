<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Tag;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Photo::all());
        $photos = Photo::orderByDesc('id')->paginate(5);
        $tags = Tag::all();
        return view('admin.photos.index', compact('photos', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.photos.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {
        $validated = $request->validated();
        // dd($request->all());

        $validated['slug'] = Str::slug($request->title, '-');

        $validated['image'] = Storage::put('uploads', $request->image);

        // dd($validated);

        $photo = Photo::create($validated);

        if ($request->has('tags')) {
            $photo->tags()->attach($validated['tags']);
        }

        return to_route('admin.photos.index')->with('status', 'Congratulations, you have added your new fantastic photo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        return view('admin.photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.photos.edit', compact('photo', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        // dd($request->all());
        $validated = $request->validated();

        if ($request->has('image')) {

            Storage::delete($photo->image);

            $image_path = Storage::put('uploads', $request->image);
            $validated['image'] = $image_path;
        }

        if (!$request->has('evidence')) {
            $photo->evidence = false;
        }

        $photo->update($validated);

        if ($request->has('tags')) {
            $photo->tags()->sync($validated['tags']);
        } else
            $photo->tags()->detach();


        return to_route('admin.photos.index')->with('status', 'Congratulations, you have uploaded your fantastic photo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        if (!Str::startsWith($photo->image, 'https//')) {
            Storage::delete($photo->image);
        }

        $photo->delete();
        return to_route('admin.photos.index')->with('status', 'Photo deleted correctly.');
    }
}
