@extends('layouts.master')

@section('title', 'Dashboard Kasir')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard Kasir</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            Halo, <b>{{ Auth::user()->username }}</b>. Anda login sebagai
            <span class="badge badge-success">{{ Auth::user()->role }}</span>.
        </div>
    </div>
@endsection