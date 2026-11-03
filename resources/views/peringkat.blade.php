@extends('layouts.app')

@section('title', 'Peringkat')

@section('content')
    <h1>10 Mahasiswa dengan Rata-rata Nilai Tertinggi</h1>

    <table>
        <thead>
            <tr><th>#</th><th>NIM</th><th>Nama</th><th>Prodi</th><th>Matkul</th><th>Rata-rata</th></tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="/mahasiswa/{{ $m->nim }}">{{ $m->nim }}</a></td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->prodi->nama }}</td>
                    <td>{{ $m->mata_kuliah_count }}</td>
                    <td>{{ number_format($m->rata_nilai, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
