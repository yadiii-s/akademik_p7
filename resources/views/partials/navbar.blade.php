<div>
    <nav>
        <a href="/beranda" @class(['aktif' => request()->is('beranda')])>Beranda</a>
        <a href="/prodi" @class(['aktif' => request()->is('prodi*')])>Prodi</a>
        <a href="/dosen" @class(['aktif' => request()->is('dosen*')])>Dosen</a>
        <a href="/mahasiswa" @class(['aktif' => request()->is('mahasiswa*')])>Mahasiswa</a>
        <a href="/matkul" @class(['aktif' => request()->is('matkul*')])>Matkul</a>
        <a href="/peringkat" @class(['aktif' => request()->is('peringkat')])>Peringkat</a>
    </nav>
</div>
