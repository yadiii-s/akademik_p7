@extends('layouts.app')
@section('title', 'Unit Kegiatan Mahasiswa')

@section('content')
    <h1>Unit Kegiatan Mahasiswa</h1>

    <form class="cari" method="GET" action="/ukm">
        <select name="kategori">
            <option value="">Semua kategori</option>
            @foreach ($daftarKategori as $k)
                <option value="{{ $k }}" @selected($kategori == $k)>{{ $k }}</option>
            @endforeach
        </select>
        <button type="submit">Tampilkan</button>
        <a href="/ukm">Reset</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Anggota</th>
                <th>Ketua</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ukms as $u)
                <tr>
                    <td><a href="/ukm/{{ $u->kode }}">{{ $u->kode }}</a></td>
                    <td>{{ $u->nama }}</td>
                    <td>{{ $u->kategori }}</td>
                    <td>{{ $u->anggota_count }}</td>
                    <td>{{ $u->anggota->first()?->nama ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Tidak ada UKM pada kategori ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $ukms->links() }}
@endsection
