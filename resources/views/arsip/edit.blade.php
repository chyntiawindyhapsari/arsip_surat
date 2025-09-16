@extends('layouts.app')

@section('content')
<div class="main-content">
    {{-- Header Section --}}
    <div class="text-center mb-4">
        <h2 class="fw-bold text-warning mb-2">
            <i class="bi bi-pencil-square me-2"></i>
            Edit Dokumen
        </h2>
        <p class="text-muted">Edit data surat yang sudah tersimpan di arsip.</p>
    </div>

    {{-- Alert untuk catatan --}}
    <div class="alert alert-warning mb-4">
        <i class="bi bi-exclamation-triangle me-2"></i>
        <strong>Catatan:</strong> Jika ingin mengganti file, unggah file PDF baru
    </div>

    {{-- Error validation --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <i class="bi bi-x-circle me-2"></i>
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
            <form action="{{ route('arsip.update', $arsip->id_arsip) }}" method="POST" enctype="multipart/form-data" 
                  class="p-4" style="background: white; border-radius: var(--radius); box-shadow: var(--shadow);">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- Nomor Surat --}}
                    <div class="col-md-6 mb-3">
                        <label for="nomor_surat" class="form-label">
                            <i class="bi bi-hash text-warning me-1"></i>
                            Nomor Surat
                        </label>
                        <input type="text" name="nomor_surat" id="nomor_surat"
                               class="form-control" value="{{ old('nomor_surat', $arsip->nomor_surat) }}" 
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
                        <i class="bi bi-file-text text-warning me-1"></i>
                        Judul Dokumen
                    </label>
                    <input type="text" name="judul" id="judul"
                           class="form-control" value="{{ old('judul', $arsip->judul) }}" 
                           placeholder="Masukkan judul dokumen">
                </div>

                {{-- File Upload --}}
                <div class="mb-4">
                    <label for="file_pdf" class="form-label">
                        <i class="bi bi-file-earmark-pdf text-warning me-1"></i>
                        File Surat (PDF)
                    </label>
                    <input type="file" name="file_pdf" id="file_pdf"
                           class="form-control" accept="application/pdf">
                    @if($arsip->file_pdf)
                        <div class="mt-2 p-2" style="background: var(--light); border-radius: 8px;">
                            <i class="bi bi-file-earmark-check text-success me-1"></i>
                            <span class="text-muted">File saat ini:</span>
                            <a href="{{ asset('uploads/'.$arsip->file_pdf) }}" target="_blank" class="fw-bold">
                                {{ $arsip->file_pdf }}
                            </a>
                        </div>
                    @endif
                    <div class="form-text">
                        <i class="bi bi-info-circle me-1"></i>
                        Kosongkan jika tidak ingin mengganti file. Maksimal 10MB, format PDF
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('arsip.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-check2-circle me-1"></i>
                        Update Dokumen
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
            fileText.innerHTML = `<i class="bi bi-upload text-success me-1"></i>File baru akan diunggah: ${fileName}`;
        }
    });
});
</script>
@endsection