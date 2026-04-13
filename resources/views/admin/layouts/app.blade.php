<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>@yield('title') — LearnHub Admin</title>
    <style>
        body { background-color: #0f172a; }

        .btn-primary        { --bs-btn-bg: #818cf8; --bs-btn-border-color: #818cf8; --bs-btn-hover-bg: #6366f1; --bs-btn-hover-border-color: #6366f1; --bs-btn-active-bg: #6366f1; }
        .btn-outline-primary{ --bs-btn-color: #818cf8; --bs-btn-border-color: #818cf8; --bs-btn-hover-bg: #818cf8; --bs-btn-hover-border-color: #818cf8; --bs-btn-hover-color: #fff; }
        .text-primary       { color: #818cf8 !important; }
        .badge.bg-primary, .bg-primary { background-color: #818cf8 !important; }

        .navbar-admin { background-color: #1e293b; border-bottom: 1px solid rgba(255,255,255,0.07); }
        .navbar-admin .navbar-brand { font-weight: 700; font-size: 1.2rem; letter-spacing: -0.3px; color: #818cf8; }
        .navbar-admin .navbar-brand .brand-sub { color: #94a3b8; font-weight: 400; font-size: 0.75rem; background: rgba(129,140,248,0.15); color: #818cf8; padding: 1px 8px; border-radius: 20px; margin-left: 6px; vertical-align: middle; }
        .navbar-admin .nav-link { color: #94a3b8; font-size: 0.9rem; padding: 0.4rem 0.75rem; border-radius: 6px; transition: background 0.15s, color 0.15s; }
        .navbar-admin .nav-link:hover, .navbar-admin .nav-link.active { background: rgba(129,140,248,0.12); color: #818cf8; }

        .card { background-color: #1e293b; border: 1px solid rgba(255,255,255,0.07); }
        .card-header { background-color: #253047; border-bottom: 1px solid rgba(255,255,255,0.07); }

        .table { --bs-table-bg: #1e293b; --bs-table-hover-bg: rgba(255,255,255,0.04); }
        .table thead th { background-color: #253047; color: #94a3b8; font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 1px solid rgba(255,255,255,0.07); }

        .list-group-item { background-color: #1e293b; border-color: rgba(255,255,255,0.07); }
        .list-group-item:hover { background-color: #253047; }
    </style>
</head>
<body>
    @include('admin.components.header')
    <div class="container mt-3">
        @yield('content')
    </div>
</body>
</html>
