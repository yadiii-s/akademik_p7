@extends('layouts.app')
@section('title', 'Inventaris Lab Komputer')

@section('content')
    <h1>Inventaris Lab Komputer</h1>
    <div class="baris">
        @foreach ($ringkasan as $judul => $nilai)
            <x-kartu :judul="$judul">{{ $nilai }}</x-kartu>
        @endforeach
    </div>

    <p>
        Alat termahal: <strong>{{ $termahal->nama }}</strong>
        (Rp {{ number_format($termahal->harga, 0, ',', '.') }}).
        Per kondisi:
        @foreach ($perKondisi as $k => $n)
            {{ $k }} {{ $n }}{{ $loop->last ? '' : ', ' }}
        @endforeach
    </p>

    <form class="cari" method="GET" action="/lab">
        <input type="text" name="q" value="{{ $q }}" placeholder="Cari nama alat...">
        <select name="kategori">
            <option value="">Semua kategori</option>
            @foreach ($daftarKategori as $k)
                <option value="{{ $k }}" @selected($kategori == $k)>{{ $k }}</option>
            @endforeach
        </select>
        <select name="kondisi">
            <option value="">Semua kondisi</option>
            @foreach (['baik', 'perbaikan', 'rusak'] as $k)
                <option value="{{ $k }}" @selected($kondisi == $k)>{{ $k }}</option>
            @endforeach
        </select>
        <button type="submit">Cari</button>
        <a href="/lab">Reset</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Harga</th>
                <th>Tanggal beli</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($alats as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="/lab/{{ $a->kode }}">{{ $a->kode }}</a></td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->kategori }}</td>
                    <td>{{ $a->jumlah }}</td>
                    <td>
                        @if ($a->kondisi == 'baik')
                            <x-badge warna="hijau">{{ $a->kondisi }}</x-badge>
                        @elseif ($a->kondisi == 'perbaikan')
                            <x-badge warna="kuning">{{ $a->kondisi }}</x-badge>
                        @else
                            <x-badge warna="merah">{{ $a->kondisi }}</x-badge>
                        @endif
                    </td>
                    <td>Rp {{ number_format($a->harga, 0, ',', '.') }}</td>
                    <td>{{ $a->tanggal_beli->format('d/m/Y') }}</td>

                </tr>
            @empty
                <tr>
                    <td colspan="8">Tidak ada alat yang cocok.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
