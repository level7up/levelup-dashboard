@if ($paginator->hasPages())
    <x-dashboard::flex class="flex-wrap">
        <x-dashboard::flex class="flex-wrap py-2 mr-3">
            {{-- Previous Page Link --}}
            <a href="{{ $paginator->previousPageUrl() }}"
                rel="prev"
                aria-label="@lang('pagination.previous')"
                @class([
                    'btn btn-icon btn-light-primary m-1',
                    'disabled' => $paginator->onFirstPage(),
                ])>
                <x-ri-arrow-left-s-line />
            </a>

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <button class="btn btn-icon border-0 btn-hover-primary m-1">{{ $element }}</button>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <a href="{{ $url }}"
                            @class([
                                'btn btn-icon border-0 btn-active-light-primary m-1',
                                'btn-primary' => $page == $paginator->currentPage(),
                            ])>
                            {{ $page }}
                        </a>
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            <a href="{{ $paginator->nextPageUrl() }}"
                rel="next"
                aria-label="@lang('pagination.next')"
                @class([
                    'btn btn-icon btn-light-primary m-1',
                    'disabled' => !$paginator->hasMorePages(),
                ])>
                <x-ri-arrow-right-s-line />
            </a>
        </x-dashboard::flex>

        <x-dashboard::flex class="py-3">
            {{-- <select class="form-control text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select> --}}

            <span class="text-muted">Displaying 15 of {{ $paginator->total() }} records</span>
        </x-dashboard::flex>
    </x-dashboard::flex>
@endif
