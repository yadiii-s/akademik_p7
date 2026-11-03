@extends('layouts.app')

@section('title', 'Daftar Mata Kuliah')

@section('content')
    <h1>Daftar Mata Kuliah</h1>

    <div class="baris">
        @foreach ($ringkasan as $judul => $nilai)
            <x-kartu :judul="$judul">{{ $nilai }}</x-kartu>
        @endforeach
    </div>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Dosen</th>
                <th>Peserta</th>
                <th>Rata-rata</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matkuls as $mk)
                <tr>
                    <td><a href="/matkul/{{ $mk->kode }}">{{ $mk->kode }}</a></td>
                    <td>{{ $mk->nama }}</td>
                    <td>{{ $mk->sks }}</td>
                    <td>{{ $mk->dosen->nama }}</td>
                    <td>{{ $mk->mahasiswa_count }}</td>
                    <td>{{ number_format($mk->rata_nilai, 1) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Beban mengajar</h2>
    <table>
        <thead>
            <tr>
                <th>Dosen</th>
                <th>Jumlah matkul</th>
                <th>Total SKS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perDosen as $nama => $data)
                <tr>
                    <td>{{ $nama }}</td>
                    <td>{{ $data['jumlah'] }}</td>
                    <td>{{ $data['sks'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
