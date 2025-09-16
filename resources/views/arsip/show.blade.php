{{-- resources/views/arsip/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">
        {{-- Card utama --}}
        <div class="card shadow-sm rounded p-4 mb-4">
            <h4 class="mb-3"><i class="bi bi-file-earmark-text me-2"></i>Arsip Surat >> Lihat</h4>

            {{-- Info Surat --}}
            <div class="mb-4">
                <div class="list-group">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-hash text-primary me-2"></i><strong>Nomor</strong></span>
                        <span>{{ $arsip->nomor_surat ?: '2022/PD3/TU/00'.$arsip->id_arsip }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-tag text-success me-2"></i><strong>Kategori</strong></span>
                        <span>{{ $arsip->kategori->nama_kategori ?? '-' }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-file-text text-info me-2"></i><strong>Judul</strong></span>
                        <span>{{ $arsip->judul }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-clock text-danger me-2"></i><strong>Waktu Unggah</strong></span>
                        <span>
                            {{ $arsip->tanggal_upload ? \Carbon\Carbon::parse($arsip->tanggal_upload)->format('d M Y H:i') : '-' }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Preview PDF --}}
            <div class="border rounded my-4" style="height:500px; overflow:hidden;">
                <iframe src="{{ asset('uploads/'.$arsip->file_pdf) }}" 
                        width="100%" height="100%" class="rounded"></iframe>
            </div>

            {{-- Tombol Navigasi --}}
            <div class="d-flex gap-2">
                <a href="{{ route('arsip.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>

                <a href="{{ asset('uploads/'.$arsip->file_pdf) }}" 
                   download="{{ $arsip->judul }}.pdf"
                   class="btn btn-warning">
                   <i class="bi bi-download me-1"></i> Unduh
                </a>

                <a href="{{ route('arsip.edit',$arsip->id_arsip) }}" 
                    class="btn btn-primary">
                    <i class="bi bi-pencil-square me-1"></i> Edit / Ganti File
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
