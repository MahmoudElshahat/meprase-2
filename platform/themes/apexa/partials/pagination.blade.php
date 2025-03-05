@if ($paginator->hasPages())
    <div class="pagination-wrap mt-40">
        <nav aria-label="Page navigation example">
            <ul class="pagination list-wrap">
                @if ($paginator->onFirstPage())
                    <li class="page-item">
                        <span class="page-link" href="#"><i class="fas fa-angle-double-left"></i></span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-angle-double-left"></i></a>
                    </li>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li>
                            <a class="page-dotted disabled" href="#" aria-disabled="true"></a>
                        </li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <li @class(['page-item', 'active' => $page == $paginator->currentPage()])>
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="page-item next-page"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-angle-double-right"></i></a></li>
                @else
                    <li class="page-item next-page">
                        <span class="page-link" href="#"><i class="fas fa-angle-double-right"></i></span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>

@endif
