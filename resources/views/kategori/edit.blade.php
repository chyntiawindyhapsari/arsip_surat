@extends('layouts.app')

@section('content')
<div class="main-content">
    {{-- Header Section --}}
    <div class="text-center mb-4">
        <h2 class="fw-bold text-primary mb-2">
            <i class="bi bi-pencil-square me-2"></i>
            Edit Kategori Surat
        </h2>
        <p class="text-muted">Edit data kategori surat yang sudah tersimpan.</p>
    </div>

    {{-- Error validation --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle me-2"></i>
            <strong>Terdapat kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Container --}}
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST"
                  class="p-4" style="background: white; border-radius: var(--radius); box-shadow: var(--shadow);">
                @csrf
                @method('PUT')

                {{-- ID Auto Increment --}}
                <div class="mb-3">
                    <label for="id_kategori" class="form-label">
                        <i class="bi bi-hash text-primary me-1"></i>
                        ID (Auto Increment)
                    </label>
                    <input type="text" class="form-control" value="{{ $kategori->id_kategori }}" readonly>
                </div>

                {{-- Nama Kategori --}}
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">
                        <i class="bi bi-tag text-primary me-1"></i>
                        Nama Kategori
                    </label>
                    <input type="text" name="nama_kategori" id="nama_kategori"
                           class="form-control"
                           value="{{ old('nama_kategori', $kategori->nama_kategori) }}" 
                           placeholder="Masukkan nama kategori">
                </div>

                {{-- Deskripsi --}}
                <div class="mb-4">
                    <label for="deskripsi" class="form-label">
                        <i class="bi bi-card-text text-primary me-1"></i>
                        Deskripsi
                    </label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="form-control" placeholder="Tambahkan deskripsi kategori">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i>
                        Update Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
