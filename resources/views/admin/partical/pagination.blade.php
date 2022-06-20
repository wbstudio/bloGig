{{-- ページャー --}}
@if ($paginator->hasPages())
    <div class="pager" role="navigation">
        {{-- @if ($paginator->currentPage() > 1) --}}
        @if (! $paginator->onFirstPage() && $paginator->total() > 0)
            {{-- First Page Link --}}
            <span>
                <a class="link" href="{{ $paginator->url(1) }}" title="最初">最初</a>
            </span>
            {{-- Previous Page Link --}}
            <span>
                <a class="link" href="{{ $paginator->previousPageUrl() }}" title="前へ">前へ</a>
            </span>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @php
                        $startPage = ($paginator->lastPage() <= $page + 6) && ($page > 3) ? $paginator->lastPage() - 6 : $paginator->currentPage() - 3;
                        $lastPage = ($page <= 7) && ($paginator->currentPage() < 6) ? config('const.DELTA') : $paginator->currentPage() + 3;
                    @endphp
                    @if ($page >= $startPage && $page <= $lastPage)
                        @if ($page === $paginator->currentPage())
                            <span class="page select">{{ $page }}</span>
                        @else
                            <span class="page">
                                <a class="link" href="{{ $url }}">{{ $page }}</a>
                            </span>
                        @endif
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            {{-- Next Page Link --}}
            <span>
                <a class="link" href="{{ $paginator->nextPageUrl() }}" title="次へ">次へ</a>
            </span>
            {{-- last Page Link --}}
            <span>
                <a class="link" href="{{ $paginator->url($paginator->lastPage()) }}" title="最後">最後</a>
            </span>
        @endif
    </div>
@endif
