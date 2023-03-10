<div class="ltn__pagination-area text-center">
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : ($this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1))

        <div class="ltn__pagination ltn__pagination-2">
            <ul>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true"><i class="icon-arrow-left"></i></span>
                    </li>
                @else
                    <li class="page-item" data-page="{{ $paginator->currentPage() }}" data-link="prev">
                        <button type="button"
                            dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                            class="page-link" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')"><i
                                class="icon-arrow-left"></i></button>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span
                                class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" data-link="button"
                                    wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}"
                                    data-page="{{ $page }}" aria-current="page"><span
                                        class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item" data-link="button"
                                    wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}"
                                    data-page="{{ $page }}">
                                    <button type="button" class="page-link"
                                        wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</button>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item" data-page="{{ $paginator->currentPage() }}" data-link="next">
                        <button type="button"
                            dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                            class="page-link" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')"><i
                                class="icon-arrow-right"></i></button>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true"><i class="icon-arrow-right"></i></span>
                    </li>
                @endif
            </ul>
        </div>
    @endif
</div>
@push('customjs')
    <script>
        $(document).ready(function() {
            $('.page-item').click(function() {
                let target = $(this);
                let link = $(target).data('link');
                let page = $(target).data('page');
                if (typeof link !== 'undefined' && typeof page !== 'undefined') {
                    if (link === 'next') {
                        let url = customUrl('page', page++)
                        console.log(url)
                        window.location.href = url
                    } else if (link === 'prev') {
                        let url = customUrl('page', page--)
                        window.location.href = url
                    } else {
                        let url = customUrl('page', page)
                        window.location.href = url
                    }
                }
            })
        })
    </script>
@endpush
