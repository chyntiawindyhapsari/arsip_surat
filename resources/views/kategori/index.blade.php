{{-- resources/views/kategori/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Kategori Surat - Document Management System')

@section('content')
<div class="container-fluid">
    <div class="row">
        {{-- Enhanced Main Content --}}
        <div class="col-lg-12 col-md-11">
            <div class="main-content">
                {{-- Page Header --}}
                <div class="page-header">
                    <h1 class="page-title">
                        <i class="bi bi-archive text-primary"></i>
                        Kategori Surat
                    </h1>
                    <p class="page-subtitle">
                        Kelola dan akses kategori surat dengan mudah dan praktis.
                    </p>
                </div>

                {{-- Enhanced Search Section --}}
                <div class="search-container">
                    <form action="{{ route('kategori.index') }}" method="GET" class="row align-items-end">
                        <div class="col-md-8 col-lg-9">
                            <label for="search" class="form-label fw-semibold text-dark">
                                <i class="bi bi-search me-1"></i>
                                Pencarian Kategori
                            </label>
                            <input type="text" 
                                   name="search" 
                                   id="search"
                                   class="form-control form-control-lg" 
                                   placeholder="Cari berdasarkan nama kategori..." 
                                   value="{{ $keyword ?? '' }}"
                                   autocomplete="off">
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-primary btn-lg flex-fill">
                                    <i class="bi bi-search"></i>
                                    Cari
                                </button>
                                @if($keyword ?? false)
                                    <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary">
                                        <i class="bi bi-x-circle"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Enhanced Action Bar --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <h4 class="mb-0 text-dark">
                            @if($keyword ?? false)
                                Hasil Pencarian "{{ $keyword }}"
                            @else
                                Daftar Kategori
                            @endif
                        </h4>
                    </div>
                    <a href="{{ route('kategori.create') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Kategori Baru
                    </a>
                </div>

                {{-- Enhanced Table --}}
                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="15%">
                                        <i class="bi bi-hash me-1"></i>
                                        Id Kategori
                                    </th>
                                    <th width="15%">
                                        <i class="bi bi-tag me-1"></i>
                                        Nama Kategori
                                    </th>
                                    <th width="35%">
                                        <i class="bi bi-file-text me-1"></i>
                                        Deskripsi
                                    </th>
                                    <th width="20%">
                                        <i class="bi bi-gear me-1"></i>
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kategori as $row)
                                    <tr id="row-{{ $row->id_kategori }}">
                                        {{-- Id Kategori --}}
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-light p-2 rounded me-2">
                                                    <i class="bi bi-file-earmark-text text-primary"></i>
                                                </div>
                                                <strong class="text-primary">
                                                    {{ $row->id_kategori }}
                                                </strong>
                                            </div>
                                        </td>
                                        {{-- Nama Kategori --}}
                                        <td>
                                            @if($row->nama_kategori)
                                                <span class="badge bg-secondary bg-opacity-20 text-light px-3 py-2">
                                                    {{ $row->nama_kategori }}
                                                </span>
                                            @else
                                                <span class="text-muted fst-italic">
                                                    <i class="bi bi-dash"></i> Tidak Ada Nama Kategori
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Deskripsi --}}
                                        <td>
                                            <div class="text-truncate" style="max-width: 300px;" title="{{ $row->deskripsi }}">
                                                <strong>{{ $row->deskripsi }}</strong>
                                            </div>
                                        </td>

                                        {{-- Aksi --}}
                                        <td>
                                            <div class="d-flex justify-content gap-1">
                                                {{-- Hapus --}}
                                                <form action="{{ route('kategori.destroy', $row->id_kategori) }}" 
                                                    method="POST" 
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" 
                                                            class="btn btn-danger btn-sm btn-delete d-flex align-items-center justify-content-center"
                                                            data-title="{{ $row->nama_kategori }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>

                                                {{-- Edit --}}
                                                <a href="{{ route('kategori.edit', $row->id_kategori) }}" 
                                                class="btn btn-warning btn-sm d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="bg-light p-4 rounded-circle mb-3">
                                                    <i class="bi bi-inbox display-4 text-muted"></i>
                                                </div>
                                                <h5 class="text-muted mb-2">
                                                    @if($keyword ?? false)
                                                        Tidak ada kategori yang sesuai dengan pencarian
                                                    @else
                                                        Belum ada kategori
                                                    @endif
                                                </h5>
                                                <p class="text-muted mb-3">
                                                    @if($keyword ?? false)
                                                        Coba gunakan kata kunci yang berbeda atau periksa ejaan.
                                                    @else
                                                        Mulai tambahkan kategori pertama Anda.
                                                    @endif
                                                </p>
                                                @if(!($keyword ?? false))
                                                    <a href="{{ route('kategori.create') }}" class="btn btn-primary">
                                                        <i class="bi bi-plus-circle"></i>
                                                        Tambahkan Kategori Pertama
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                        </table>
                    </div>
                </div>

                {{-- Enhanced Pagination --}}
                @if($kategori->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Menampilkan {{ $row->firstItem() }} - {{ $kategori->lastItem() }} 
                            dari {{ $kategori->total() }} dokumen
                        </div>
                        <div>
                            {{ $kategori->appends(request()->query())->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Custom Styles --}}
<style>
.quick-action-card {
    transition: all 0.3s ease;
    border: 1px solid var(--border-color);
}

.quick-action-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border-color: var(--primary-color);
}

.table-container {
    position: relative;
}

.table-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--primary-dark));
    border-radius: 1rem 1rem 0 0;
}

/* Enhanced badge styles */
.badge {
    font-weight: 500;
    font-size: 0.75rem;
}

/* Tooltip enhancements */
.tooltip-inner {
    background-color: var(--dark-bg);
    font-size: 0.8rem;
    font-weight: 500;
}

/* Button group enhancements */
.btn-group .btn {
    border-radius: 0;
}

.btn-group .btn:first-child {
    border-radius: 0.375rem 0 0 0.375rem;
}

.btn-group .btn:last-child {
    border-radius: 0 0.375rem 0.375rem 0;
}

/* Loading state for search */
.search-loading {
    position: relative;
}

.search-loading::after {
    content: '';
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    width: 16px;
    height: 16px;
    border: 2px solid #f3f3f3;
    border-top: 2px solid var(--primary-color);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Delete confirmation
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const form = this.closest('form');
            const title = this.getAttribute('data-title');

            Swal.fire({
                title: `Hapus dokumen "${title}"?`,
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
2022
    // Enhanced delete confirmation
    window.confirmDelete = function(title) {
        return confirm(`Apakah Anda yakin ingin menghapus dokumen "${title}"?\n\nTindakan ini tidak dapat dibatalkan.`);
    };

    // Auto-focus search on page load
    const searchInput = document.getElementById('search');
    if (searchInput && !searchInput.value) {
        searchInput.focus();
    }

    // Search form enhancements
    const searchForm = document.querySelector('form[action*="kategori.index"]');
    if (searchForm) {
        const searchButton = searchForm.querySelector('button[type="submit"]');
        const searchField = searchForm.querySelector('input[name="search"]');

        searchForm.addEventListener('submit', function() {
            if (searchButton) {
                searchButton.innerHTML = '<span class="loading me-2"></span>Mencari...';
                searchButton.disabled = true;
            }
            if (searchField) {
                searchField.classList.add('search-loading');
            }
        });

        // Enable search on Enter key
        searchField.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchForm.submit();
            }
        });
    }

    // Row click to view detail (optional enhancement)
    const tableRows = document.querySelectorAll('tbody tr[id^="row-"]');
    tableRows.forEach(row => {
        row.style.cursor = 'pointer';
        row.addEventListener('click', function(e) {
            // Only trigger if clicked area is not a button or link
            if (!e.target.closest('button') && !e.target.closest('a')) {
                const viewLink = this.querySelector('a[href*="show"]');
                if (viewLink) {
                    window.location.href = viewLink.href;
                }
            }
        });
    });

    // Smooth animations for dynamic content
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });

    document.querySelectorAll('.card, .table-container').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.5s ease';
        observer.observe(el);
    });
});
</script>
@endpush

@endsection