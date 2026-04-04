<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
        Course::create($courseData);

        return redirect()->route('admin.courses.index')->with('success', 'Course added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        $users = User::all();
        return view('admin.courses.show',compact('course','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findorFail($id);
        return view('admin.courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findorFail($id);
        $course->delete();

        return to_route('admin.courses.index')->with('success','Course deleted');
    }
}
