<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>@yield('title') — LearnHub</title>
    <style>
        body { background-color: #0f172a; }

        .btn-primary        { --bs-btn-bg: #38bdf8; --bs-btn-border-color: #38bdf8; --bs-btn-hover-bg: #0ea5e9; --bs-btn-hover-border-color: #0ea5e9; --bs-btn-active-bg: #0ea5e9; --bs-btn-color: #0f172a; --bs-btn-hover-color: #fff; }
        .btn-outline-primary{ --bs-btn-color: #38bdf8; --bs-btn-border-color: #38bdf8; --bs-btn-hover-bg: #38bdf8; --bs-btn-hover-border-color: #38bdf8; --bs-btn-hover-color: #0f172a; }
        .btn-success        { --bs-btn-bg: #34d399; --bs-btn-border-color: #34d399; --bs-btn-hover-bg: #10b981; --bs-btn-hover-border-color: #10b981; --bs-btn-color: #0f172a; --bs-btn-hover-color: #fff; }
        .btn-outline-success{ --bs-btn-color: #34d399; --bs-btn-border-color: #34d399; --bs-btn-hover-bg: #34d399; --bs-btn-hover-color: #0f172a; }
        .text-primary       { color: #38bdf8 !important; }
        .badge.bg-primary, .bg-primary { background-color: #38bdf8 !important; color: #0f172a !important; }
        .badge.bg-success,  .bg-success { background-color: #34d399 !important; color: #0f172a !important; }

        .navbar-user { background-color: #1e293b; border-bottom: 1px solid rgba(255,255,255,0.07); }
        .navbar-user .navbar-brand { font-weight: 700; font-size: 1.2rem; letter-spacing: -0.3px; color: #38bdf8; }
        .navbar-user .nav-link { color: #94a3b8; font-size: 0.9rem; padding: 0.4rem 0.75rem; border-radius: 6px; transition: background 0.15s, color 0.15s; }
        .navbar-user .nav-link:hover, .navbar-user .nav-link.active { background: rgba(56,189,248,0.1); color: #38bdf8; }

        .card { background-color: #1e293b; border: 1px solid rgba(255,255,255,0.07); }
        .card-header { background-color: #253047; border-bottom: 1px solid rgba(255,255,255,0.07); }

        .table { --bs-table-bg: #1e293b; --bs-table-hover-bg: rgba(255,255,255,0.04); }
        .table thead th { background-color: #253047; color: #94a3b8; font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 1px solid rgba(255,255,255,0.07); }

        .list-group-item { background-color: #1e293b; border-color: rgba(255,255,255,0.07); }
        .list-group-item:hover { background-color: #253047; }

        .list-group-item.active { background-color: rgba(56,189,248,0.15); border-color: rgba(56,189,248,0.3); color: #38bdf8; }
    </style>
</head>
<body>
    @include('user.components.header')
    <div class="container mt-3">
        @yield('content')
    </div>
</body>
</html>
