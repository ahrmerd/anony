<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $people = \App\Models\Person::orderBy('name')->get();
        return view('welcome', compact('people'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:suggestion,weird,person',
            'content' => 'required|string',
            'target_person' => 'nullable|string|required_if:type,person',
        ]);

        Message::create($request->all());

        return back()->with('success', 'Your message has been submitted anonymously! 🧺🐜');
    }

    public function admin()
    {
        $messages = Message::latest()->get()->groupBy('type');
        return view('admin', compact('messages'));
    }
}
