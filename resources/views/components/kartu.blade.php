<div>
    @props(['judul'])
    <div class="kartu">
        <h3>{{ $judul }}</h3>
        <div class="isi">{{ $slot }}</div>
    </div>
</div>
