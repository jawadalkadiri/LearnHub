<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseTeacher;

class TeacherController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request, string $id)
    {
        $request->validate([
            'teacher_id' => 'required',
            'teacher_id.*' => 'exists:users,id',
        ]);

        foreach ($request->teacher_id as $teacher_id) {
            CourseTeacher::firstOrCreate([
                'user_id' => $teacher_id,
                'course_id' => $id,
            ]);
        }


        return redirect()->back()->with('success', 'Teacher assigned successfully');

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
