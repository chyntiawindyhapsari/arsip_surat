{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Document Management System')</title>
    <meta name="description" content="Sistem Manajemen Dokumen Profesional">
    
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #1f2937;
            --secondary: #374151;
            --accent: #3b82f6;
            --success: #059669;
            --warning: #d97706;
            --danger: #dc2626;
            --light: #f8fafc;
            --dark: #111827;
            --white: #ffffff;
            --border: #e5e7eb;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --radius: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            font-weight: 400;
        }

        /* Sidebar */
        .sidebar {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            position: sticky;
            top: 2rem;
            height: fit-content;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border);
            background: var(--primary);
            color: var(--white);
            border-radius: var(--radius) var(--radius) 0 0;
        }

        .sidebar-header h5 {
            margin: 0;
            font-weight: 600;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar-nav {
            padding: 0.5rem 0;
        }

        .sidebar-nav .nav-link {
            color: var(--secondary);
            padding: 0.875rem 1.5rem;
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            border: none;
            border-radius: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-nav .nav-link:hover {
            background: #f1f5f9;
            color: var(--primary);
            text-decoration: none;
        }

        .sidebar-nav .nav-link.active {
            background: #eff6ff;
            color: var(--accent);
            border-right: 3px solid var(--accent);
            font-weight: 600;
        }

        /* Alerts */
        .alert {
            border: 1px solid transparent;
            border-radius: var(--radius);
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
            font-size: 0.875rem;
            box-shadow: var(--shadow-sm);
        }

        .alert-success {
            background: #f0fdf4;
            color: #166534;
            border-color: #bbf7d0;
        }

        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border-color: #fecaca;
        }

        /* Buttons */
        .btn {
            font-weight: 500;
            font-size: 0.875rem;
            padding: 0.625rem 1.25rem;
            border-radius: var(--radius);
            border: 1px solid transparent;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #2563eb;
            border-color: #2563eb;
            color: var(--white);
            box-shadow: var(--shadow-sm);
        }

        .btn-success {
            background: var(--success);
            border-color: var(--success);
            color: var(--white);
        }

        .btn-success:hover {
            background: #047857;
            border-color: #047857;
            color: var(--white);
            box-shadow: var(--shadow-sm);
        }

        .btn-warning {
            background: var(--warning);
            border-color: var(--warning);
            color: var(--white);
        }

        .btn-warning:hover {
            background: #b45309;
            border-color: #b45309;
            color: var(--white);
            box-shadow: var(--shadow-sm);
        }

        .btn-danger {
            background: var(--danger);
            border-color: var(--danger);
            color: var(--white);
        }

        .btn-danger:hover {
            background: #b91c1c;
            border-color: #b91c1c;
            color: var(--white);
            box-shadow: var(--shadow-sm);
        }

        .btn-secondary {
            background: var(--secondary);
            border-color: var(--secondary);
            color: var(--white);
        }

        .btn-secondary:hover {
            background: #4b5563;
            border-color: #4b5563;
            color: var(--white);
            box-shadow: var(--shadow-sm);
        }

        .btn-sm {
            padding: 0.5rem 0.875rem;
            font-size: 0.8125rem;
        }

        /* Forms */
        .form-control {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            background: var(--white);
        }

        .form-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        /* Cards & Containers */
        .main-content {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 2rem;
        }

        .search-container {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-sm);
        }

        .table-container {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .table thead th {
            background: var(--primary);
            color: var(--white);
            font-weight: 600;
            font-size: 0.8125rem;
            padding: 1rem;
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .table tbody td {
            padding: 0.875rem 1rem;
            border-color: var(--border);
            vertical-align: middle;
            font-size: 0.875rem;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        .card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
        }

        /* Page Elements */
        .page-header {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .page-title {
            color: var(--dark);
            font-weight: 700;
            font-size: 1.875rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .page-title i {
            color: var(--accent);
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 1rem;
            font-weight: 400;
        }

        /* Badges */
        .badge {
            font-weight: 500;
            font-size: 0.75rem;
            padding: 0.375rem 0.875rem;
            border-radius: 9999px;
        }

        /* Animation */
        .fade-in {
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Footer */
        footer {
            background: var(--white);
            border-top: 1px solid var(--border);
            margin-top: 3rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column !important;
                gap: 0.5rem !important;
                margin-top: 1rem;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .main-content {
                padding: 1.5rem;
            }

            .search-container {
                padding: 1rem;
            }
        }

        /* Loading */
        .loading {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Text Colors */
        .text-primary { color: var(--primary) !important; }
        .text-secondary { color: var(--secondary) !important; }
        .text-muted { color: #6b7280 !important; }

        /* Professional spacing */
        .container-fluid {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Clean hover effects */
        .nav-link, .btn {
            cursor: pointer;
        }

        /* Remove excessive shadows and gradients */
        .btn:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
        }
    </style>
</head>
<body>
    <div class="container-fluid mt-4">
        <div class="row">
            {{-- Sidebar --}}
            <div class="col-lg-3 col-md-3 mb-4">
                <div class="sidebar">
                    <div class="sidebar-header">
                        <h5>
                            <i class="bi bi-grid-3x3-gap"></i>
                            Menu Navigasi
                        </h5>
                    </div>
                    <ul class="nav flex-column sidebar-nav">
                        <li class="nav-item">
                            <a href="{{ route('arsip.index') }}" 
                               class="nav-link {{ Request::routeIs('arsip.*') ? 'active' : '' }}">
                                <i class="bi bi-archive"></i>
                                <span>Arsip Dokumen</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kategori.index') }}" 
                               class="nav-link {{ Request::routeIs('kategori.*') ? 'active' : '' }}">
                                <i class="bi bi-tags"></i>
                                <span>Kategori Surat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about') }}" 
                               class="nav-link {{ Request::routeIs('about') ? 'active' : '' }}">
                                <i class="bi bi-info-circle"></i>
                                <span>Tentang Sistem</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Main Content --}}
            <div class="col-lg-9 col-md-9">
                {{-- Flash Messages --}}
                @if(session('success'))
                    <div class="alert alert-success fade-in">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger fade-in">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        {{ session('error') }}
                    </div>
                @endif

                <main class="fade-in">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-6 text-end">
                    <p class="mb-0 text-muted">
                        <i class="bi bi-c-circle me-1"></i>
                        {{ date('Y') }} LSP Arsip Surat. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- Custom JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-hide alerts
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-10px)';
                    setTimeout(() => alert.remove(), 300);
                }, 5000);
            });

            // Add loading states to buttons
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        const originalText = submitBtn.innerHTML;
                        submitBtn.innerHTML = '<span class="loading me-2"></span>Processing...';
                        submitBtn.disabled = true;
                    }
                });
            });

            // Smooth scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
        });
    </script>

    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>