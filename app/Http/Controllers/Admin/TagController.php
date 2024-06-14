<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::orderByDesc('id')->get();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->name, '-');
        Tag::create($validated);
        return to_route('admin.tags.index')->with('status', 'The Tag was successfully added!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->name, '-');
        $tag->update($validated);

        return to_route('admin.tags.index')->with('status', 'The tag was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return to_route('admin.tags.index')->with('status', 'The Tag was successfully deleted!');
    }
}
