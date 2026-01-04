@if ($paginator->hasPages())
<nav class="flex items-center justify-between mt-4" role="navigation" aria-label="Pagination Navigation">

    {{-- Mobile --}}
    <div class="flex justify-between flex-1 sm:hidden">
        {{-- Prev --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-sm text-gray-400 bg-gray-100 rounded-md cursor-not-allowed">
                Prev
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               class="px-4 py-2 text-sm font-medium text-red-600 bg-white border border-red-200 rounded-md hover:bg-red-50 transition">
                Prev
            </a>
        @endif

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="px-4 py-2 ml-3 text-sm font-medium text-red-600 bg-white border border-red-200 rounded-md hover:bg-red-50 transition">
                Next
            </a>
        @else
            <span class="px-4 py-2 ml-3 text-sm text-gray-400 bg-gray-100 rounded-md cursor-not-allowed">
                Next
            </span>
        @endif
    </div>

    {{-- Desktop --}}
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
        <p class="text-sm text-gray-600">
            Showing
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            to
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            of
            <span class="font-medium">{{ $paginator->total() }}</span>
            results
        </p>

        <div>
            <span class="inline-flex shadow-sm rounded-md overflow-hidden">

                {{-- Prev --}}
                @if ($paginator->onFirstPage())
                    <span class="px-3 py-2 text-gray-400 bg-gray-100 border border-red-200 cursor-not-allowed">
                        ‹
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-3 py-2 text-red-600 bg-white border border-red-200 hover:bg-red-50 transition">
                        ‹
                    </a>
                @endif

                {{-- Pages --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="px-3 py-2 text-gray-500 bg-white border border-red-200">
                            {{ $element }}
                        </span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="px-4 py-2 text-white bg-red-600 border border-red-600 font-semibold">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                   class="px-4 py-2 text-blue-600 bg-white border border-blue-200 hover:bg-blue-50 transition">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-3 py-2 text-blue-600 bg-white border border-blue-200 hover:bg-blue-50 transition">
                        ›
                    </a>
                @else
                    <span class="px-3 py-2 text-gray-400 bg-gray-100 border border-blue-200 cursor-not-allowed">
                        ›
                    </span>
                @endif

            </span>
        </div>
    </div>
</nav>
@endif
