@extends('layouts.app')

@section('title', 'Daftar Prodi')

@section('content')
    <h1>Daftar Program Studi</h1>

    <x-alert>Terdapat {{ count($prodis) }} program studi terdaftar.</x-alert>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jenjang</th>
                <th>Ketua Prodi</th>
                <th>Mahasiswa</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($prodis as $p)
                <tr>
                    <td>{{ $p->kode }}</td>
                    <td>{{ $p->nama }}</td>
                    <td><x-badge :warna="$p->jenjang === 'D4' ? 'hijau' : 'biru'">{{ $p->jenjang }}</x-badge></td>
                    <td>{{ $p->ketua_prodi ?? '-' }}</td>
                    <td>{{ $p->mahasiswa_count }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data prodi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
