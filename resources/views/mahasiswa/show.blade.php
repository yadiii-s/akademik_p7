@extends('layouts.app')

@section('title', $mahasiswa->nama)

@section('content')
    <h1>{{ $mahasiswa->nama }}</h1>

    <dl>
        <dt>NIM</dt>
        <dd>{{ $mahasiswa->nim }}</dd>
        <dt>Angkatan</dt>
        <dd>{{ $mahasiswa->angkatan }}</dd>
        <dt>Status</dt>
        <dd>{{ $mahasiswa->status }}</dd>
        <dt>Program Studi</dt>
        <dd>{{ $mahasiswa->prodi->nama }} ({{ $mahasiswa->prodi->jenjang }})</dd>
        <dt>Dosen Wali</dt>
        <dd>{{ $mahasiswa->dosenWali?->nama ?? 'Belum ditentukan' }}</dd>
        <dt>IPK</dt>
        <dd>{{ $mahasiswa->ipk ?? '-' }}</dd>
    </dl>

    <h2>Transkrip</h2>
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Nilai</th>
                <th>Huruf</th>
                <th>Dosen</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswa->mataKuliah as $mk)
                <tr>
                    <td><a href="/matkul/{{ $mk->kode }}">{{ $mk->kode }}</a></td>
                    <td>{{ $mk->nama }}</td>
                    <td>{{ $mk->sks }}</td>
                    <td>{{ $mk->pivot->semester }}</td>
                    <td>{{ $mk->pivot->nilai ?? '-' }}</td>
                    <td><x-badge :warna="$mk->pivot->bobot >= 3 ? 'hijau' : 'biru'">{{ $mk->pivot->huruf }}</x-badge></td>
                    <td>{{ $mk->dosen->nama }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum mengambil mata kuliah.</td>
                </tr>
            @endforelse
        </tbody>
        @if ($mahasiswa->mataKuliah->isNotEmpty())
            <tfoot>
                <tr>
                    <th colspan="2">Total SKS</th>
                    <th>{{ $mahasiswa->mataKuliah->sum('sks') }}</th>
                    <th colspan="4"></th>
                </tr>
            </tfoot>
        @endif
    </table>

    <h2>UKM yang diikuti</h2>
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>UKM</th>
                <th>Jabatan</th>
                <th>Bergabung</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswa->ukm as $u)
                <tr>
                    <td><a href="/ukm/{{ $u->kode }}">{{ $u->kode }}</a></td>
                    <td>{{ $u->nama }}</td>
                    <td>{{ $u->pivot->jabatan }}</td>
                    <td>{{ \Illuminate\Support\Carbon::parse($u->pivot->bergabung_pada)->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum mengikuti UKM.</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    <p><a href="/mahasiswa">&larr; Kembali ke daftar</a></p>
@endsection
