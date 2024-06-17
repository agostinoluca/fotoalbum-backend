<?php

namespace App\Http\Controllers;

use App\Mail\NewLeadMessage;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function create()
    {
        return view('guests.leads.create');
    }


    public function store(Request $request)
    {
        // dd($request);

        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required|max:1500'
            ]
        );

        $newLead = Lead::create($validated);

        Mail::to('admin@fotoalbum.com')->send(new NewLeadMessage($newLead));

        return back()->with('status', 'Message sent successfully!');
    }
}
