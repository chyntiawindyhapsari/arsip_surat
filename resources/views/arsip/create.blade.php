@extends('layouts.app')

@section('content')
<div class="main-content">
    {{-- Header Section --}}
    <div class="text-center mb-4">
        <h2 class="fw-bold text-primary mb-2">
            <i class="bi bi-cloud-upload me-2"></i>
            Unggah Dokumen Baru
        </h2>
        <p class="text-muted">Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
    </div>

    {{-- Alert untuk catatan --}}
    <div class="alert alert-info mb-4">
        <i class="bi bi-info-circle me-2"></i>
        <strong>Catatan:</strong> Gunakan file berformat PDF
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
            <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data" 
                  class="p-4" style="background: white; border-radius: var(--radius); box-shadow: var(--shadow);">
                @csrf

                <div class="row">
                    {{-- Nomor Surat --}}
                    <div class="col-md-6 mb-3">
                        <label for="nomor_surat" class="form-label">
                            <i class="bi bi-hash text-primary me-1"></i>
                            Nomor Surat
                        </label>
                        <input type="text" name="nomor_surat" id="nomor_surat"
                               class="form-control" value="{{ old('nomor_surat') }}" 
                               placeholder="Contoh: 001/DIR/2024">
                    </div>

                    {{-- Kategori --}}
                    <div class="col-md-6 mb-3">
                        <label for="id_kategori" class="form-label">
                            <i class="bi bi-tag text-primary me-1"></i>
                            Kategori
                        </label>
                        <select name="id_kategori" id="id_kategori" class="form-select">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $kat)
                                <option value="{{ $kat->id_kategori }}" 
                                    {{ (old('id_kategori') ?? ($arsip->id_kategori ?? '')) == $kat->id_kategori ? 'selected' : '' }}>
                                    {{ $kat->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Judul --}}
                <div class="mb-3">
                    <label for="judul" class="form-label">
                        <i class="bi bi-file-text text-primary me-1"></i>
                        Judul Dokumen
                    </label>
                    <input type="text" name="judul" id="judul"
                           class="form-control" value="{{ old('judul') }}" 
                           placeholder="Masukkan judul dokumen">
                </div>

                {{-- File Upload --}}
                <div class="mb-4">
                    <label for="file_pdf" class="form-label">
                        <i class="bi bi-file-earmark-pdf text-primary me-1"></i>
                        File Surat (PDF)
                    </label>
                    <input type="file" name="file_pdf" id="file_pdf"
                           class="form-control" accept="application/pdf">
                    <div class="form-text">
                        <i class="bi bi-info-circle me-1"></i>
                        Maksimal ukuran file 10MB, format PDF
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('arsip.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i>
                        Simpan Dokumen
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // File input preview
    const fileInput = document.getElementById('file_pdf');
    fileInput.addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        if (fileName) {
            const fileText = document.querySelector('.form-text');
            fileText.innerHTML = `<i class="bi bi-check-circle text-success me-1"></i>File terpilih: ${fileName}`;
        }
    });
});
</script>
@endsection