<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index(Request $request)
    {

        if ($request->has('search')) {

            if ($request->search == "" && $request->category == "") {
                return response()->json([
                    'success' => true,
                    'results' => Photo::with(['category', 'tags'])->where('evidence', true)->orderByDesc('id')->paginate(6),
                ]);
            } else if ($request->search != "" && $request->has('category') && $request->category != '' && $request->evidence == true) {
                return response()->json([
                    'success' => true,
                    'results' => Photo::with(['category', 'tags'])->where('evidence', true)->where('category_id', $request->category)->where('title', 'like', '%' . $request->search . '%')->orderByDesc('id')->paginate(6),
                ]);
            } else if ($request->search != "" && $request->category == '' && $request->evidence == true) {
                return response()->json([
                    'success' => true,
                    'results' => Photo::with(['category', 'tags'])->where('evidence', true)->where('title', 'like', '%' . $request->search . '%')->orderByDesc('id')->paginate(6),
                ]);
            } else if ($request->search == "" && $request->category != '' && $request->evidence == true) {
                return response()->json([
                    'success' => true,
                    'results' => Photo::with(['category', 'tags'])->where('evidence', true)->where('category_id', $request->category)->orderByDesc('id')->paginate(6),
                ]);
            } else if ($request->search != "" && $request->category != '') {
                return response()->json([
                    'success' => true,
                    'results' => Photo::with(['category', 'tags'])->where('category_id', $request->category)->where('title', 'like', '%' . $request->search . '%')->orderByDesc('id')->paginate(6),
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'results' => Photo::with(['category', 'tags'])->where('title', 'like', '%' . $request->search . '%')->orderByDesc('id')->paginate(6),
                ]);
            }
        }


        return response()->json([
            'success' => true,
            'results' => Photo::with(['category', 'tags'])->where('evidence', true)->orderByDesc('id')->paginate(6),
        ]);
    }



    public function show($id)
    {
        $photo = Photo::with(['category', 'tags'])->where('id', $id)->first();
        if ($photo) {
            return response()->json([
                'success' => true,
                'results' => $photo
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Photo not found'

            ], 404);
        }
    }
}
