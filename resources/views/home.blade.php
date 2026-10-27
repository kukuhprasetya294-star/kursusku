@extends('layouts.app')

@section('title', 'Beranda Kursusku')

@section('content')
<section class="py-5">
    <div class="row align-items-center g-4">
        <div class="col-lg-7">
            <span class="badge text-bg-success mb-3">Kursus teknologi untuk mahasiswa</span>
            <h1 class="display-5 fw-bold">Belajar lebih terarah bersama Kursusku</h1>
            <p class="lead text-secondary">
                Pilih kursus, cek ketersediaan kursi, lalu isi formulir pendaftaran.
            </p>
            <a href="{{ route('enrollments.create') }}" class="btn btn-success">Daftar Kursus</a>
        </div>
    </div>
</section>
@endsection