@extends('layouts.app')
@section('title', $alat->nama)

@section('content')
    <h1>{{ $alat->nama }}</h1>

    <dl>
        <dt>Kode</dt>
        <dd>{{ $alat->kode }}</dd>
        <dt>Kategori</dt>
        <dd>{{ $alat->kategori }}</dd>
        <dt>Jumlah</dt>
        <dd>{{ $alat->jumlah }} unit</dd>
        <dt>Kondisi</dt>
        <dd>{{ $alat->kondisi }}</dd>
        <dt>Harga satuan</dt>
        <dd>Rp {{ number_format($alat->harga, 0, ',', '.') }}</dd>
        <dt>Tanggal beli</dt>
        <dd>{{ $alat->tanggal_beli->format('d/m/Y') }}</dd>
    </dl>

    <p><a href="/lab">&larr; Kembali ke daftar</a></p>
@endsection
