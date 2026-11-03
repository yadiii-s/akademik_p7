<div>
    @props(['warna' => 'biru'])
    <span {{ $attributes->class(['badge', 'badge-' . $warna]) }}>{{ $slot }}</span>

</div>
