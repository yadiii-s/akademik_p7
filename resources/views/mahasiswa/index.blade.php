@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <h1>Daftar Mahasiswa</h1>

    <form class="cari" method="GET" action="/mahasiswa">
        <input type="text" name="q" value="{{ $q }}" placeholder="Cari nama...">
        <select name="prodi">
            <option value="">Semua prodi</option>
            @foreach ($prodis as $p)
                <option value="{{ $p->id }}" @selected($prodiId == $p->id)>{{ $p->nama }}</option>
            @endforeach
        </select>
        <button type="submit">Cari</button>
        <a href="/mahasiswa">Reset</a>
    </form>

    @if ($mahasiswas->total() > 0)
        <p>Menampilkan {{ $mahasiswas->firstItem() }}&ndash;{{ $mahasiswas->lastItem() }} dari {{ $mahasiswas->total() }}
            mahasiswa.</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Matkul</th>
                <th>Rata-rata</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswas as $m)
                <tr>
                    <td><a href="/mahasiswa/{{ $m->nim }}">{{ $m->nim }}</a></td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->prodi->nama }}</td>
                    <td>{{ $m->mata_kuliah_count }}</td>
                    <td>{{ number_format($m->rata_nilai, 1) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Tidak ada mahasiswa yang cocok.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $mahasiswas->links() }}
@endsection
