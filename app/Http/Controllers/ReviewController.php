<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Store a new review for a wisata.
     * Route dilindungi oleh middleware 'auth'.
     */
    public function store(Request $request, $wisataId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:2000',
        ]);

        $wisata = Wisata::findOrFail($wisataId);

        $wisata->reviews()->create([
            'user_id' => $request->user()->id,
            'rating'  => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('wisatas.show', $wisata->slug)->with('success', 'Review submitted.');
    }
}
