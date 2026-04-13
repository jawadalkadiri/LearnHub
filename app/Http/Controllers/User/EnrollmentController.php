<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use App\Notifications\NewEnrollmentNotification;


class EnrollmentController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $enrollments = Enrollment::where('user_id', $user->id)->get();

        return view('user.my-courses.index', compact('enrollments'));
    }

    public function create()
    {
    }

    public function store(Request $request, $id)
    {
        $course_id = $id;
        $user = auth()->user();
        $user_id = $user->id;

        $enrollment = Enrollment::firstOrCreate(['course_id' => $course_id, 'user_id' => $user_id]);

        if ($enrollment->wasRecentlyCreated) {
            $admins = User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                $admin->notify(new NewEnrollmentNotification($user, $enrollment->course));
            }
        }

        return redirect()->route('user.courses.index')->with('success', 'Enrolled successfully!');

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
        $user = auth()->user();
        Enrollment::where('user_id', $user->id)
                  ->where('course_id', $id)
                  ->delete();

        return redirect()->route('user.courses.index')->with('success', 'Unenrolled successfully!');
    }
}
