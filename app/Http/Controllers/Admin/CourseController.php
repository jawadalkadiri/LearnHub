<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Http;


class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index',compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $courseData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img_path' => 'nullable|image|extensions:jpg,jpeg,png,gif|max:5096',
        ]);

        if ($request->hasFile('img_path')) {
            $courseData['img_path'] = $request->file('img_path')->store('course_images', 'public');
        }

        $url = 'https://api.groq.com/openai/v1/chat/completions';
        $body = [
            "model" => "llama-3.3-70b-versatile",
            "messages" =>[
                [
                    "role"=>"user",
                    "content" => "Write a short 2-3 sentence course description for a course titled: " . $courseData['title'] . ". Write it as plain text only, no markdown, no bullet points, no stars, no dashes, no headers. Just clean paragraphs.",

                ]
            ]
        ];



       $response = Http::withToken(env('GROQ_API_KEY'))->post($url, $body);




        $courseData['description'] = $response->json('choices.0.message.content');


        Course::create($courseData);

        return redirect()->route('admin.courses.index')->with('success', 'Course added successfully!');
    }

    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        $users = User::all();
        return view('admin.courses.show',compact('course','users'));
    }

    public function edit(string $id)
    {
        $course = Course::findorFail($id);
        return view('admin.courses.edit',compact('course'));
    }

    public function update(Request $request, string $id)
    {
         $new_course = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img_path' => 'nullable|image|extensions:jpg,jpeg,png,gif|max:5096',
        ]);
        if($request->hasFile('img_path')){
            $new_course['img_path'] = $request->file('img_path')->store('course_images','public');
        }

        $old_course = Course::findorFail($id);

        $old_course->update($new_course);

        return to_route('admin.courses.index')->with('success','Course updated successfully');
    }

    public function destroy(string $id)
    {
        $course = Course::findorFail($id);
        $course->delete();

        return to_route('admin.courses.index')->with('success','Course deleted');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $courses = Course::where('title', 'LIKE', "%$query%")
                         ->orWhere('description', 'LIKE', "%$query%")
                         ->get();
        return view('admin.courses.index', compact('courses'));
    }
}
