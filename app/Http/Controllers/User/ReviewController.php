<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        $course_id = request()->route('course_id');
        return view('user.reviews.create', compact('course_id'));
    }

    public function store(Request $request)
    {
        $course_id = $request->route('course_id');
        $user_id = auth()->id();

        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        Review::updateOrCreate(
            ['course_id' => $course_id, 'user_id' => $user_id],
            ['rating' => $validatedData['rating'], 'comment' => $validatedData['comment']]
        );

        return redirect()->route('user.courses.show', $course_id)->with('success', 'Your review has been submitted successfully.');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
}
