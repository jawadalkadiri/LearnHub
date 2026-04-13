<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return view('admin.lessons.index',compact('lessons'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('admin.lessons.create',compact('courses'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_path' => 'required|file|mimes:mp4,avi,mov|max:512000',
            'course_id' => 'required|exists:courses,id'
        ]);

        if($request->hasFile('video_path')){
            $validatedData['video_path'] = $request->file('video_path')->store('lesson_videos', 'public');
        }

        Lesson::create($validatedData);
        return redirect()->route('admin.lessons.index')->with('success', 'Lesson created successfully.');
    }

    public function show(string $id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('admin.lessons.show', compact('lesson'));
    }

    public function edit(string $id)
    {
        $lesson = Lesson::findOrFail($id);
        $courses = Course::all();
        return view('admin.lessons.edit', compact('lesson', 'courses'));
    }

    public function update(Request $request, string $id)
    {
        $lesson = Lesson::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_path' => 'nullable|file|mimes:mp4,avi,mov|max:512000',
            'course_id' => 'required|exists:courses,id'
        ]);

        if ($request->hasFile('video_path')) {
            if ($lesson->video_path) {
                \Storage::disk('public')->delete($lesson->video_path);
            }

            $validatedData['video_path'] = $request->file('video_path')
                ->store('lesson_videos', 'public');
        }

        $lesson->update($validatedData);
        return redirect()->route('admin.lessons.index')->with('success', 'Lesson updated successfully.');
    }

    public function destroy(string $id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();
        return redirect()->route('admin.lessons.index')->with('success', 'Lesson deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $lessons = Lesson::where('title', 'LIKE', "%$query%")
                         ->orWhere('description', 'LIKE', "%$query%")
                         ->get();
        return view('admin.lessons.index', compact('lessons'));
    }
}
