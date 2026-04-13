<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\LessonController as AdminLessonController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\EnrollmentController as AdminEnrollmentController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\User\CourseController as UserCourseController;
use App\Http\Controllers\User\EnrollmentController as UserEnrollmentController;
use App\Http\Controllers\User\ReviewController as UserReviewController;
use App\Http\Controllers\Admin\NotificationController as AdminNotificationController;

Route::get('/phpinfo', function () {
    return phpinfo();
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth','verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth','admin','verified')->group(function () {

        // Admin dashboard and profile routes
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');
    Route::get('admin/courses/index', [AdminCourseController::class, 'index'])->name('admin.courses.index');
    Route::get('admin/courses/create', [AdminCourseController::class, 'create'])->name('admin.courses.create');
    Route::post('admin/courses/store', [AdminCourseController::class, 'store'])->name('admin.courses.store');
    Route::get('admin/courses/edit/{id}',[AdminCourseController::class, 'edit'])->name('admin.courses.edit');
    Route::put('admin/courses/update/{id}',[AdminCourseController::class, 'update'])->name('admin.courses.update');
    Route::get('admin/courses/search', [AdminCourseController::class, 'search'])->name('admin.courses.search');
    Route::delete('admin/courses/destroy/{id}',[AdminCourseController::class, 'destroy'])->name('admin.courses.destroy');
    Route::get('admin/courses/{id}', [AdminCourseController::class, 'show'])->name('admin.courses.show');

        // Enrollment routes
    Route::post('admin/enrollments/store/{id}', [AdminEnrollmentController::class, 'store'])->name('admin.enrollments.store');
    Route::delete('admin/enrollments/destroy/{user_id}/{course_id}', [AdminEnrollmentController::class, 'destroy'])->name('admin.enrollments.destroy');
        // Teacher assignment routes
    Route::post('admin/teachers/store/{id}', [AdminTeacherController::class, 'store'])->name('admin.teachers.store');
        // Lesson routes
    Route::get('admin/lessons/index', [AdminLessonController::class, 'index'])->name('admin.lessons.index');
    Route::get('admin/lessons/create', [AdminLessonController::class, 'create'])->name('admin.lessons.create');
    Route::post('admin/lessons/store', [AdminLessonController::class, 'store'])->name('admin.lessons.store');
    Route::get('admin/lessons/edit/{id}',[AdminLessonController::class, 'edit'])->name('admin.lessons.edit');
    Route::put('admin/lessons/update/{id}',[AdminLessonController::class, 'update'])->name('admin.lessons.update');
    Route::delete('admin/lessons/destroy/{id}',[AdminLessonController::class, 'destroy'])->name('admin.lessons.destroy');
    Route::get('admin/lessons/search', [AdminLessonController::class, 'search'])->name('admin.lessons.search');
    Route::get('admin/lessons/{id}', [AdminLessonController::class, 'show'])->name('admin.lessons.show');
        // User management routes
    Route::get('admin/users/index', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('admin/users/store', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('admin/users/edit/{id}',[AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/update/{id}',[AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/destroy/{id}',[AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('admin/users/search', [AdminUserController::class, 'search'])->name('admin.users.search');
    Route::get('admin/users/{id}', [AdminUserController::class, 'show'])->name('admin.users.show');

    Route::get('admin/notifications/index', [AdminNotificationController::class, 'index'])->name('admin.notifications.index');
    Route::put('admin/notifications/update/{id}', [AdminNotificationController::class, 'update'])->name('admin.notifications.update');
    Route::post('admin/notifications/read-all', [AdminNotificationController::class, 'markAllAsRead'])->name('admin.notifications.read-all');
});

Route::middleware('auth','verified')->group(function () {
    Route::get('user/courses/index', [UserCourseController::class, 'index'])->name('user.courses.index');
    Route::get('user/courses/search', [UserCourseController::class, 'search'])->name('user.courses.search');
    Route::get('user/courses/{id}', [UserCourseController::class, 'show'])->name('user.courses.show');
    Route::post('user/enrollments/store/{id}', [UserEnrollmentController::class, 'store'])->name('user.enrollments.store');
    Route::delete('user/enrollments/destroy/{id}', [UserEnrollmentController::class, 'destroy'])->name('user.enrollments.destroy');
    Route::get('user/enrolled-courses/index', [UserEnrollmentController::class, 'index'])->name('user.enrollments.index');

    Route::get('user/reviews/create/{course_id}', [UserReviewController::class, 'create'])->name('user.reviews.create');
    Route::post('user/reviews/store/{course_id}', [UserReviewController::class, 'store'])->name('user.reviews.store');
});
