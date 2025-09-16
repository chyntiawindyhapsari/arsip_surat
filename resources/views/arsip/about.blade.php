@extends('layouts.app')

@section('title', 'Tentang Sistem')

@section('content')
<div class="container py-3"> {{-- kurangi py dari 4 ke 3 --}}
    <div class="row justify-content-center">
        <div class="col-12">
            {{-- Header Section --}}
            <div class="text-center mb-4"> {{-- mb-4 → mb-3 --}}
                <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 rounded-circle mb-2" 
                     style="width: 50px; height: 50px;"> {{-- mb-3 → mb-2 --}}
                    <i class="bi bi-info-circle text-primary fs-4"></i>
                </div>
                <h2 class="fw-bold text-dark mb-1">Tentang Aplikasi</h2>
                <p class="text-muted mb-0">Sistem Manajemen Arsip Surat Digital</p>
            </div>

            {{-- Main Card --}}
            <div class="card shadow border-0 rounded-3 mb-3"> {{-- tambah mb-3 agar tidak terlalu menempel ke bawah --}}
                <div class="card-header bg-gradient text-white py-2" style="background: linear-gradient(135deg, #1f2937 0%, #374151 100%);"> {{-- py-3 → py-2 --}}
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0 fw-semibold">
                                <i class="bi bi-person-circle me-2"></i>
                                Profil Developer
                            </h5>
                        </div>
                        <div class="col-auto">
                            <span class="badge bg-white text-dark px-3 py-1 rounded-pill">
                                <i class="bi bi-code-slash me-1"></i>
                                Laravel Developer
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-5"> {{-- p-4 → p-3 --}}
                    <div class="row align-items-center g-3"> {{-- tambah g-3 untuk spacing internal --}}
                        {{-- Profile Image --}}
                        <div class="col-md-3 text-center">
                            <div class="position-relative d-inline-block mb-2">
                                <img src="{{ asset('images/foto.jpg') }}" alt="Foto Profil"
                                    class="rounded-3 shadow border img-fluid" 
                                    style="width: 140px; height: 140px; object-fit: cover; object-position: center top;">
                                <div class="position-absolute top-0 end-0 translate-middle">
                                    <span class="badge bg-success rounded-circle p-1">
                                        <i class="bi bi-check-lg"></i>
                                    </span>
                                </div>
                            </div>
                            <h5 class="fw-bold text-primary mt-1 mb-1">Chyntia Windy Hapsari</h5>
                            <small class="text-muted">D3 Manajemen Informatika</small>
                        </div>

                        {{-- Profile Details --}}
                        <div class="col-md-9">
                            <div class="row g-2">
                                {{-- Kolom kiri detail --}}
                                <div class="col-md-6">
                                    <div class="bg-light rounded-2 p-2 mb-2"> {{-- p-3 → p-2 --}}
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-2 flex-shrink-0" style="width: 35px; height: 35px;">
                                                <i class="bi bi-mortarboard text-primary small"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted fw-semibold d-block">PROGRAM STUDI</small>
                                                <small class="fw-bold">D3 Manajemen Informatika</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-light rounded-2 p-2">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-success bg-opacity-10 rounded-circle p-2 me-2 flex-shrink-0" style="width: 35px; height: 35px;">
                                                <i class="bi bi-person-badge text-success small"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted fw-semibold d-block">NIM</small>
                                                <small class="fw-bold">2331730070</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Kolom kanan detail --}}
                                <div class="col-md-6">
                                    <div class="bg-light rounded-2 p-2 mb-2">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-info bg-opacity-10 rounded-circle p-2 me-2 flex-shrink-0" style="width: 35px; height: 35px;">
                                                <i class="bi bi-calendar-event text-info small"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted fw-semibold d-block">TANGGAL</small>
                                                <small class="fw-bold">05 Sept 2025</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-light rounded-2 p-2">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-2 flex-shrink-0" style="width: 35px; height: 35px;">
                                                <i class="bi bi-gear text-warning small"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted fw-semibold d-block">TEKNOLOGI</small>
                                                <small class="fw-bold">Laravel & Bootstrap</small>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end kolom kanan -->

                            </div>
                        </div>
                    </div>
                </div>

            </div> {{-- end Main Card --}}
        </div>
    </div>
</div>
@endsection
