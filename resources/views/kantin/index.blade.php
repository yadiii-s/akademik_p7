@extends('layouts.kantin')

@section('title', 'Daftar Menu')

@section('content')
    <h1>Daftar Menu Kantin</h1>

    <x-alert>Total {{ $total }} menu, {{ $habis }} di antaranya habis.</x-alert>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($menu as $m)
                <tr @class(['habis' => $m['stok'] === 0])>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $m['nama'] }}</td>
                    <td>{{ $m['kategori'] }}</td>
                    <td>Rp {{ number_format($m['harga'], 0, ',', '.') }}</td>
                    <td>
                        @if ($m['stok'] == 0)
                            <x-badge warna="merah">Habis</x-badge>
                        @elseif ($m['stok'] <= 5)
                            <x-badge warna="kuning">Tersisa {{ $m['stok'] }}</x-badge>
                        @else
                            <x-badge warna="hijau">Tersedia</x-badge>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada menu.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
