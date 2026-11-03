<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Uji Blade</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <main class="container">
        <h1>Uji Blade</h1>

        <h2>1. Menampilkan data</h2>
        <p>Nama: <strong>{{ $nama }}</strong> (NIM {{ $nim }})</p>
        <p>IPK: {{ number_format($ipk, 2) }}</p>
        <p>IPK x 4 = {{ $ipk * 4 }}, nama huruf besar = {{ strtoupper($nama) }}</p>
        <p>Catatan: {{ $catatan }}</p>

        <h2>2. Percabangan</h2>
        @if ($ipk >= 3.5)
            <p>Predikat: Cum Laude</p>
        @elseif ($ipk >= 3.0)
            <p>Predikat: Sangat Memuaskan</p>
        @else
            <p>Predikat: Memuaskan</p>
        @endif

        <h2>3. Perulangan</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matkul as $mk)
                    <tr @class(['gagal' => $mk['nilai'] < 60])>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mk['nama'] }}</td>
                        <td>{{ $mk['sks'] }}</td>
                        <td>{{ number_format($mk['nilai'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>Total SKS: {{ collect($matkul)->sum('sks') }}</p>

        <h2>4. Daftar kosong</h2>
        @forelse ($riwayat as $r)
            <p>{{ $r }}</p>
        @empty
            <p>Belum ada riwayat.</p>
        @endforelse

    </main>

</body>

</html>
