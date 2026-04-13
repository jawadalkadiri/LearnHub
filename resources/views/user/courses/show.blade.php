@extends('user.layouts.app')
@section('title','View Lessons')

@section('content')
<div class="py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold">{{ $course->title }}</h1>
            <p class="text-muted">{{ $course->description }}</p>
        </div>
    </div>

    @if($course_lessons->count() > 0)
        <div class="row">
            <div class="col-12 col-lg-8 mb-4 mb-lg-0">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-0">
                        <video id="videoPlayer" class="w-100 rounded" style="max-height: 400px; object-fit: contain;" controls>
                            <source id="videoSource"
                                src="{{ asset('storage/' . $course_lessons[0]->video_path) }}"
                                type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title" id="lessonTitle">{{ $course_lessons[0]->title }}</h4>
                        <p class="card-text text-muted" id="lessonDesc">{{ $course_lessons[0]->description }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3">
                        <h6 class="mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul me-1" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-8 11.5a.5.5 0 0 1 .5-.5H1a1.5 1.5 0 1 1 0-3H1a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5H1a1.5 1.5 0 1 1 0-3H1a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5H1a1.5 1.5 0 1 1 0-3H1a.5.5 0 0 1-.5-.5"/>
                            </svg>
                            Course Lessons ({{ $course_lessons->count() }})
                        </h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($course_lessons as $index => $lesson)
                            <li class="list-group-item lesson-item {{ $index == 0 ? 'active' : '' }}"
                                style="cursor:pointer"
                                data-video="{{ asset('storage/' . $lesson->video_path) }}"
                                data-title="{{ $lesson->title }}"
                                data-desc="{{ $lesson->description }}">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle me-2" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445"/>
                                    </svg>
                                    <span>{{ $lesson->title }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-info-circle me-2" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
            </svg>
            <div>No lessons available for this course yet.</div>
        </div>
    @endif
</div>

@if($course_lessons->count() > 0)
<script>
    const lessons = document.querySelectorAll('.lesson-item');
    const video = document.getElementById('videoPlayer');
    const source = document.getElementById('videoSource');
    const title = document.getElementById('lessonTitle');
    const desc = document.getElementById('lessonDesc');

    lessons.forEach(item => {
        item.addEventListener('click', () => {
            source.src = item.dataset.video;
            video.load();
            title.innerText = item.dataset.title;
            desc.innerText = item.dataset.desc;
            lessons.forEach(l => l.classList.remove('active'));
            item.classList.add('active');
        });
    });
</script>
@endif

@endsection
