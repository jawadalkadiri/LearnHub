<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('user.courses.index', compact('courses'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        $course_lessons = $course->lessons;
        return view('user.courses.show', compact('course', 'course_lessons'));
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

    public function search(Request $request)
    {
        $query = $request->input('q');
        $courses = Course::where('title', 'LIKE', "%$query%")
                         ->orWhere('description', 'LIKE', "%$query%")
                         ->get();

        return view('user.courses.index', compact('courses'));
    }
}
