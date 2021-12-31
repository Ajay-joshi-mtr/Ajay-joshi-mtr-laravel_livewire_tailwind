@if ($paginator->hasPages())
<span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end float-right">
<nav aria-label="Table navigation">
   
    <nav role="navigation" aria-label="Table navigation">
        <div class="inline-flex items-center sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <button type="button" wire:click="previousPage" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple">
                    {!! __('pagination.previous') !!}
                </button>
            @endif

            @if ($paginator->hasMorePages())
                <button type="button" wire:click="nextPage" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple">
                    {!! __('pagination.next') !!}
                </button>
            @else
                <span class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                <span class="inline-flex items-center">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-hidden="true">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <button type="button" wire:click="previousPage" rel="prev" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                   
                                <span class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">{{ $page }}</span>
                                   
                                @else
                                    <button type="button" wire:click="gotoPage({{ $page }})" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </button>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <button type="button" wire:click="nextPage" rel="next" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-hidden="true">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
    </span>
@endif