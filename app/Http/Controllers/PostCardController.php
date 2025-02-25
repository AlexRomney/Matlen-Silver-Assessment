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
            'recipient_name' => 'required|min:2|max:25',
            'address1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
            'message' => 'required'
        ]);

        PostCard::create($validated);

        return back();
    }
}
