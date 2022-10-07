<div id="example_wrapper" class="dataTables_wrapper">
    <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
        @if ($paginator->currentPage() < $paginator->lastPage())
            {{ __('Showing :initial to :final of :total entries', ['initial' => ($paginator->currentPage() - 1) * $paginator->perPage() + 1, 'final' => $paginator->currentPage() * $paginator->perPage(), 'total' => $paginator->total()]) }}
        @else
            {{ __('Showing :initial to :final of :total entries', ['initial' => ($paginator->currentPage() - 1) * $paginator->perPage() + 1, 'final' => $paginator->total(), 'total' => $paginator->total()]) }}
        @endif
    </div>
    <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
        @if ($paginator->onFirstPage())
        @else
            <a wire:click.prevent="previousPage" rel="prev" aria-label="@lang('pagination.previous')"
                class="paginate_button previous disabled" aria-controls="example" data-dt-idx="0" tabindex="0"
                id="example_previous">{{ __('Previous') }}</a>
        @endif
        @if ($paginator->total() != $paginator->currentPage())
            @foreach ($elements as $element)
                <span>
                    @if (is_string($element))
                        <li class="pagination-item disabled" aria-disabled="true">
                            * <a href="#">{{ $element }}</a>*
                        </li>
                    @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a class="paginate_button current" aria-controls="example"
                                    data-dt-idx="{{ $page }}" tabindex="0"
                                    wire:click.prevent>{{ $page }}</a>
                            @else
                                <a class="paginate_button " aria-controls="example" id="page-{{ $page }}"
                                    data-dt-idx="{{ $page }}" tabindex="0"
                                    wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                </span>
            @endforeach
        @else
            <a class="paginate_button current" aria-controls="example" data-dt-idx="{{ $page }}" tabindex="0"
                wire:click.prevent>{{ $page }}</a>
        @endif
        @if ($paginator->hasMorePages())
            <a class="paginate_button next" aria-controls="example" data-dt-idx="7" tabindex="0"
                id="example_next">Next</a>
        @endif
    </div>
</div>
