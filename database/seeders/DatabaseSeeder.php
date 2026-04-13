<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name'              => 'Admin',
            'email'             => 'admin@learnhub.com',
            'password'          => Hash::make('password'),
            'role'              => 'admin',
            'email_verified_at' => now(),
        ]);

        $teachers = collect([
            ['name' => 'Ahmed Hassan',   'email' => 'ahmed@learnhub.com'],
            ['name' => 'Sara Ali',       'email' => 'sara@learnhub.com'],
            ['name' => 'Omar Khaled',    'email' => 'omar@learnhub.com'],
        ])->map(fn($t) => User::create([
            'name'              => $t['name'],
            'email'             => $t['email'],
            'password'          => Hash::make('password'),
            'role'              => 'teacher',
            'email_verified_at' => now(),
        ]));

        $students = collect([
            ['name' => 'Youssef Nabil',  'email' => 'youssef@gmail.com'],
            ['name' => 'Nour Mohamed',   'email' => 'nour@gmail.com'],
            ['name' => 'Kareem Samir',   'email' => 'kareem@gmail.com'],
            ['name' => 'Layla Ibrahim',  'email' => 'layla@gmail.com'],
            ['name' => 'Tarek Mostafa',  'email' => 'tarek@gmail.com'],
            ['name' => 'Hana Adel',      'email' => 'hana@gmail.com'],
        ])->map(fn($s) => User::create([
            'name'              => $s['name'],
            'email'             => $s['email'],
            'password'          => Hash::make('password'),
            'role'              => 'user',
            'email_verified_at' => now(),
        ]));

        $coursesData = [
            [
                'title'       => 'Complete Web Development Bootcamp',
                'description' => 'Learn HTML, CSS, JavaScript, and PHP from scratch. Build real-world projects and become a full-stack web developer.',
                'teacher'     => $teachers[0],
                'lessons'     => [
                    ['title' => 'Introduction to HTML',         'description' => 'Learn the building blocks of every web page: tags, attributes, and document structure.'],
                    ['title' => 'CSS Styling & Flexbox',        'description' => 'Style your pages with CSS, master the box model, and build flexible layouts with Flexbox.'],
                    ['title' => 'JavaScript Fundamentals',      'description' => 'Variables, functions, loops, and DOM manipulation — your first steps into programming the web.'],
                    ['title' => 'Responsive Design',            'description' => 'Make your sites look great on any screen using media queries and Bootstrap.'],
                    ['title' => 'PHP & MySQL Basics',           'description' => 'Server-side scripting with PHP and storing data in a MySQL database.'],
                    ['title' => 'Building a Full-Stack App',    'description' => 'Tie everything together by building a complete CRUD application from scratch.'],
                ],
            ],
            [
                'title'       => 'Laravel for Beginners',
                'description' => 'Master the Laravel framework step by step. Covers routing, Eloquent ORM, Blade templates, and authentication.',
                'teacher'     => $teachers[0],
                'lessons'     => [
                    ['title' => 'Laravel Installation & Setup',     'description' => 'Install Composer, create a new Laravel project, and tour the directory structure.'],
                    ['title' => 'Routing & Controllers',            'description' => 'Define routes, create resource controllers, and understand the request lifecycle.'],
                    ['title' => 'Blade Templating Engine',          'description' => 'Use layouts, components, and directives to build dynamic, reusable views.'],
                    ['title' => 'Eloquent ORM',                     'description' => 'Query your database with expressive Eloquent models and relationships.'],
                    ['title' => 'Authentication & Middleware',       'description' => 'Add login, registration, and protect routes with built-in authentication scaffolding.'],
                    ['title' => 'File Uploads & Storage',           'description' => 'Handle file uploads, manage the filesystem, and serve stored files to users.'],
                ],
            ],
            [
                'title'       => 'Python Programming Masterclass',
                'description' => 'From absolute beginner to confident Python developer. Covers data structures, OOP, file handling, and popular libraries.',
                'teacher'     => $teachers[1],
                'lessons'     => [
                    ['title' => 'Python Basics & Syntax',           'description' => 'Install Python, write your first script, and understand variables and data types.'],
                    ['title' => 'Control Flow & Functions',         'description' => 'If-statements, loops, and writing reusable functions with parameters and return values.'],
                    ['title' => 'Lists, Tuples & Dictionaries',     'description' => 'Master Python\'s core data structures and learn when to use each one.'],
                    ['title' => 'Object-Oriented Programming',      'description' => 'Classes, objects, inheritance, and encapsulation — OOP the Pythonic way.'],
                    ['title' => 'File Handling & Exceptions',       'description' => 'Read and write files, handle errors gracefully, and build robust programs.'],
                    ['title' => 'Working with APIs',                'description' => 'Use the requests library to consume REST APIs and process JSON data.'],
                ],
            ],
            [
                'title'       => 'UI/UX Design Fundamentals',
                'description' => 'Learn the principles of great user interface and user experience design. Tools covered: Figma.',
                'teacher'     => $teachers[1],
                'lessons'     => [
                    ['title' => 'Design Thinking & Process',        'description' => 'Understand the design thinking framework and how to apply it to real projects.'],
                    ['title' => 'Color Theory & Typography',        'description' => 'Choose harmonious color palettes and readable typefaces that reinforce your brand.'],
                    ['title' => 'Wireframing with Figma',           'description' => 'Sketch low-fidelity wireframes and iterate quickly before committing to a design.'],
                    ['title' => 'Prototyping & User Flows',         'description' => 'Link frames in Figma to create interactive prototypes you can share with stakeholders.'],
                    ['title' => 'Usability Testing',                'description' => 'Plan and run usability tests, gather feedback, and iterate on your designs.'],
                ],
            ],
            [
                'title'       => 'Data Science with Python',
                'description' => 'Analyze data, build visualizations, and create machine learning models using pandas, matplotlib, and scikit-learn.',
                'teacher'     => $teachers[2],
                'lessons'     => [
                    ['title' => 'NumPy & Array Operations',         'description' => 'Speed up numerical computations with NumPy arrays and vectorized operations.'],
                    ['title' => 'Data Analysis with Pandas',        'description' => 'Load, clean, and explore datasets using DataFrames and Series.'],
                    ['title' => 'Data Visualization',               'description' => 'Create insightful charts with matplotlib and seaborn.'],
                    ['title' => 'Introduction to Machine Learning', 'description' => 'Understand supervised vs unsupervised learning and the ML workflow.'],
                    ['title' => 'Classification Models',            'description' => 'Build and evaluate decision trees, logistic regression, and KNN classifiers.'],
                    ['title' => 'Regression & Predictions',         'description' => 'Predict continuous values with linear regression and assess model performance.'],
                ],
            ],
            [
                'title'       => 'Mobile App Development with Flutter',
                'description' => 'Build beautiful cross-platform iOS and Android apps using Google\'s Flutter framework and Dart language.',
                'teacher'     => $teachers[2],
                'lessons'     => [
                    ['title' => 'Dart Language Basics',             'description' => 'Learn Dart syntax, types, functions, and async/await before diving into Flutter.'],
                    ['title' => 'Flutter Widgets & Layouts',        'description' => 'Understand the widget tree and compose UIs with Row, Column, and Container.'],
                    ['title' => 'State Management',                 'description' => 'Manage app state using setState, Provider, and the basics of Riverpod.'],
                    ['title' => 'Navigation & Routing',             'description' => 'Push and pop screens, pass arguments, and build a multi-page app.'],
                    ['title' => 'HTTP & REST API Integration',      'description' => 'Fetch data from a backend API and display it in your Flutter app.'],
                    ['title' => 'Publishing to App Stores',         'description' => 'Prepare your app for release and walk through the submission process.'],
                ],
            ],
        ];

        $courses = [];
        foreach ($coursesData as $i => $data) {
            $course = Course::create([
                'title'       => $data['title'],
                'description' => $data['description'],
            ]);

            $course->teachedBy()->attach($data['teacher']->id);

            foreach ($data['lessons'] as $order => $lesson) {
                Lesson::create([
                    'course_id'   => $course->id,
                    'title'       => $lesson['title'],
                    'description' => $lesson['description'],
                    'video_path'  => null,
                ]);
            }

            $courses[] = $course;
        }

        $enrollmentMap = [
            0 => [0, 1, 4],
            1 => [0, 2, 5],
            2 => [1, 2, 3],
            3 => [3, 4],
            4 => [0, 1, 5],
            5 => [2, 3, 4, 5],
        ];

        foreach ($students as $si => $student) {
            foreach ($enrollmentMap[$si] as $ci) {
                Enrollment::create([
                    'user_id'   => $student->id,
                    'course_id' => $courses[$ci]->id,
                ]);
            }
        }

        $reviews = [
            [0, 0, 5, 'Amazing course! Went from zero to building real websites. Highly recommended.'],
            [0, 4, 4, 'Very well structured. The PHP section could go a bit deeper, but overall excellent.'],
            [0, 1, 5, 'Best web dev course I have taken. Clear explanations and great projects.'],
            [1, 2, 5, 'Finally understand Laravel after this course. The Eloquent section is gold.'],
            [1, 4, 5, 'Comprehensive and practical. Loved the file upload and auth chapters.'],
            [2, 1, 4, 'Great introduction to Python. Would love more exercises at the end of each lesson.'],
            [2, 2, 5, 'Super clear teacher. I felt comfortable with OOP after just two lessons.'],
            [2, 5, 4, 'Very good course. The API chapter was my favourite part.'],
            [3, 2, 5, 'Changed the way I think about design. The Figma walkthroughs are top-notch.'],
            [3, 3, 4, 'Really enjoyed the usability testing section. Practical and insightful.'],
            [3, 5, 5, 'Incredible course for anyone who wants to break into design.'],
            [4, 0, 5, 'Pandas and matplotlib explained better here than anywhere else I have looked.'],
            [4, 3, 4, 'Solid intro to ML. I wish there were more datasets to practice on.'],
            [4, 5, 5, 'Went from knowing nothing about data science to building classifiers. Wow.'],
            [5, 1, 5, 'Flutter is incredible and this course does it justice. Dart was easier than I expected.'],
            [5, 4, 4, 'Great course. State management section was a bit fast but still very useful.'],
            [5, 5, 5, 'Published my first app after finishing this. Cannot believe how smooth it was.'],
        ];

        foreach ($reviews as [$ci, $si, $rating, $comment]) {
            Review::create([
                'course_id' => $courses[$ci]->id,
                'user_id'   => $students[$si]->id,
                'rating'    => $rating,
                'comment'   => $comment,
            ]);
        }
    }
}
