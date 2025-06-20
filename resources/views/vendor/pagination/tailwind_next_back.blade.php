@if ($paginator->hasPages()) 
    <nav aria-label="Navigasi Halaman">
        <ul class="flex items-center space-x-4">
            {{-- Tombol Sebelumnya --}}
            @if ($paginator->onFirstPage()) 
                <li aria-disabled="true">
                    <span class="px-4 py-2 rounded-md bg-gray-300 text-gray-500 font-semibold">
                        Sebelumnya
                    </span>
                </li>
            @else 
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-4 py-2 rounded-md bg-blue-500 text-gray-50 font-semibold hover:bg-blue-600 transition">
                        Sebelumnya
                    </a>
                </li>
            @endif

            @if ($paginator->hasMorePages()) 
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-4 py-2 rounded-md bg-blue-500 text-gray-50 font-semibold hover:bg-blue-600 transition">
                        Selanjutnya
                    </a>
                </li>
            @else 
                <li aria-disabled="true">
                    <span class="px-4 py-2 rounded-md bg-gray-300 text-gray-500 font-semibold">
                        Selanjutnya
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
