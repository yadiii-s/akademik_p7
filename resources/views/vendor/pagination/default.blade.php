@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="pagination">
            {{-- Tombol Sebelumnya (<) --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true"><span>&lsaquo;</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo;</a></li>
            @endif

            {{-- Elemen Nomor Halaman --}}
            @foreach ($elements as $element)
                {{-- Pemisah Tiga Titik "..." --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Tautan Halaman --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Selanjutnya (>) --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;</a></li>
            @else
                <li class="disabled" aria-disabled="true"><span>&rsaquo;</span></li>
            @endif
        </ul>
    </nav>
@endif
