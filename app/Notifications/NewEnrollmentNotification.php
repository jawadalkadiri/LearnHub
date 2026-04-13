<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class NewEnrollmentNotification extends Notification
{
    use Queueable;

    public $user;
    public $course;

    public function __construct($user, $course)
    {
        $this->user = $user;
        $this->course = $course;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => $this->user->name . ' enrolled in ' . $this->course->title,
            'user_id' => $this->user->id,
            'course_id' => $this->course->id,
            'link' => route('admin.courses.show', $this->course->id),
        ];
    }
}
