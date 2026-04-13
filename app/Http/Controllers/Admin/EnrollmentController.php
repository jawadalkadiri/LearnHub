<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request,$course_id)
    {
        $request->validate([
         'user_id' => 'required|array',
         'user_id.*' => 'exists:users,id',
        ]);

        foreach ($request->user_id as $user_id) {
            Enrollment::firstOrCreate([
                'user_id' => $user_id,
                'course_id' => $course_id,
            ]);
        }



        return redirect()->back()->with('success', 'User enrolled successfully');

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

    public function destroy(string $user_id, string $course_id)
    {
        Enrollment::where('user_id', $user_id)
                  ->where('course_id', $course_id)
                  ->delete();

        return redirect()->back()->with('success', 'User unenrolled successfully');
    }
}
