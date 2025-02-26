<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PostCard;

class PostCardController extends Controller
{
    public function index()
    {
        return Inertia::render('PostCard');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'recipient_name' => 'required|string',
            'address1' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string|max:50',
            'postal_code' => 'required|string|max:20',
            'message' => 'required|string',
            'cover_text' => 'nullable|string',
            'image' => 'nullable|image|max:4096|mimes:png,jpg,jpeg'
        ]);

        PostCard::create($validated);

        return back();
    }
}
