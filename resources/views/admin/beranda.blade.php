@extends('layouts.master')

@section('title', 'Dashboard Admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Selamat Datang</h6>
        </div>
        <div class="card-body">
            <p class="mb-1">
                Halo, <b>{{ Auth::user()->username }}</b>.
                Anda login sebagai <span class="badge badge-primary">{{ Auth::user()->role }}</span>.
            </p>
            <p class="mb-0">Menu Barang dan Laporan akan kita tambahkan pada Materi 4.</p>
        </div>
    </div>
@endsection