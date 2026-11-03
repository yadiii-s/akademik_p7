<div>
    @props(['tipe' => 'info'])
    <div {{ $attributes->class(['alert', 'alert-' . $tipe]) }}>
        {{ $slot }}
    </div>
</div>
