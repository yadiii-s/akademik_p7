<nav>
    <a href="/kantin" @class(['aktif' => request()->is('kantin', 'kantin/kosong')])>Menu</a>
    <a href="/kantin/tentang" @class(['aktif' => request()->is('kantin/tentang')])>Tentang</a>
</nav>
