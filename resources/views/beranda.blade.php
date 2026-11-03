@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <h1>Beranda</h1>
    <x-alert tipe="sukses">Selamat datang di Sistem Akademik Mini.</x-alert>

    <div class="baris">
        @foreach ($jumlah as $judul => $angka)
            <x-kartu :judul="$judul">{{ $angka }}</x-kartu>
        @endforeach
    </div>
@endsection
