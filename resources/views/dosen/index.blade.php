@extends('layouts.app')

@section('title', 'Daftar Dosen')

@section('content')
    <h1>Daftar Dosen</h1>
    <x-alert tipe="bahaya">Data dosen bersifat contoh.</x-alert>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dosens as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->nidn }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->email }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data dosen.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
