@extends('layouts.app')

@section('title', $matkul->nama)

@section('content')
    <h1>{{ $matkul->kode }} &middot; {{ $matkul->nama }}</h1>
    <p>{{ $matkul->sks }} SKS &middot; Pengampu: {{ $matkul->dosen->nama }}</p>

    <div class="baris">
        <x-kartu judul="Peserta">{{ $peserta->count() }}</x-kartu>
        <x-kartu judul="Rata-rata">{{ number_format($peserta->avg('pivot.nilai'), 1) }}</x-kartu>
        <x-kartu judul="Tertinggi">{{ $peserta->max('pivot.nilai') }}</x-kartu>
        <x-kartu judul="Terendah">{{ $peserta->min('pivot.nilai') }}</x-kartu>
    </div>

    <h2>Sebaran nilai</h2>
    <table class="sebaran">
        @foreach ($distribusi as $huruf => $jumlah)
            <tr>
                <td style="width: 60px">{{ $huruf }}</td>
                <td><div class="batang" style="width: {{ $jumlah / $peserta->count() * 100 }}%"></div></td>
                <td style="width: 60px">{{ $jumlah }}</td>
            </tr>
        @endforeach
    </table>

    <h2>Peserta</h2>
    <table>
        <thead>
            <tr><th>#</th><th>NIM</th><th>Nama</th><th>Semester</th><th>Nilai</th><th>Huruf</th></tr>
        </thead>
        <tbody>
            @foreach ($peserta as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="/mahasiswa/{{ $m->nim }}">{{ $m->nim }}</a></td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->pivot->semester }}</td>
                    <td>{{ $m->pivot->nilai }}</td>
                    <td>{{ $m->pivot->huruf }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><a href="/matkul">&larr; Kembali ke daftar mata kuliah</a></p>
@endsection
