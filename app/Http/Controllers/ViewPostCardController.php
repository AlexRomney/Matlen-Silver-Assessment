<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PostCard;

class ViewPostCardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        return Inertia::render('ViewPostCard', [
            'postCard' => PostCard::findOrFail($id)
        ]);
    }
}
