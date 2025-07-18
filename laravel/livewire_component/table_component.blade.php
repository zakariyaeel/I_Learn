<div>
    <div class="kt-card kt-card-grid min-w-full">
        <div class="kt-card-content">
            <div class="kt-scrollable-x-auto">
                <table class="kt-table table-auto kt-table-border" data-kt-datatable-table="true">
                    <thead>
                        <tr>
                            <th class="w-[60px] text-center">
                                <input class="kt-checkbox kt-checkbox-sm" data-kt-datatable-check="true" type="checkbox">
                            </th>
                            @foreach ($columns as $col)
                                <th class="min-w-[120px]">
                                    <span class="kt-table-col">
                                        <span class="kt-table-col-label">{{ $col['label'] ?? ucfirst($col['key']) }}</span>
                                        <span class="kt-table-col-sort"></span>
                                    </span>
                                </th>
                            @endforeach
                            <th class="w-[60px]"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse( $items as $item)
                        <tr>
                            <td class="text-center">
                                <input class="kt-checkbox kt-checkbox-sm" data-kt-datatable-row-check="true" type="checkbox" value="{{ $item->id ?? '' }}"/>
                            </td>
                            @foreach ( $columns as $col)
                                <td>
                                    {{ $item->{$col['key']} ?? '-' }}
                                </td>
                            @endforeach
                            <td class="relative">
                                <div class="kt-menu" x-data="{ open: false }" @click.away="open = false">
                                    <button @click="open = !open" class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                        <i class="ki-filled ki-dots-vertical text-lg"></i>
                                    </button>
                                    <div x-cloak x-show="open" 
                                        class="alpine-dropdown min-w-[200px] p-2 bg-white rounded-lg shadow-lg absolute right-0 z-50"
                                        x-transition
                                        style="display: none;"
                                    >
                                        @foreach ($actions as $action)
                                            <div>
                                                <a class="block px-4 py-2 rounded hover:bg-gray-100 text-gray-800 transition-colors duration-150" href="{{ route($action['route'], $item->{$action['param']} ?? null) }}">
                                                    <span class="kt-menu-title">{{ $action['label'] }}</span>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ count($columns) + 2 }}" class="text-center">Aucun résultat trouvé.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if ($items->lastPage() > 1)
        <nav class="flex justify-end py-4">
            <ul class="inline-flex items-center -space-x-px">
                {{-- Previous --}}
                <li>
                    <a href="{{ $items->previousPageUrl() ?? '#' }}"
                    class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 {{ $items->onFirstPage() ? 'pointer-events-none opacity-50' : '' }}"
                    style="border-top-left-radius:8px; border-bottom-left-radius:8px;">
                        Précédent
                    </a>
                </li>
                {{-- Page Numbers --}}
                @php
                    $total = $items->lastPage();
                    $current = $items->currentPage();
                    $max = 5; // nombre max de numéros affichés
                    $start = max(1, $current - floor($max / 2));
                    $end = min($total, $start + $max - 1);
                    if ($end - $start < $max - 1) {
                        $start = max(1, $end - $max + 1);
                    }
                @endphp

                {{-- Numéros dynamiques sans ellipses --}}
                @for ($i = $start; $i <= $end; $i++)
                    <li>
                        <a href="{{ $items->url($i) }}"
                        class="px-3 py-2 leading-tight border border-gray-300 {{ $current == $i ? 'bg-blue-500 text-white' : 'bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-700' }}">
                            {{ $i }}
                        </a>
                    </li>
                @endfor

                {{-- Next --}}
                <li>
                    <a href="{{ $items->nextPageUrl() ?? '#' }}"
                    class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 {{ !$items->hasMorePages() ? 'pointer-events-none opacity-50' : '' }}"
                    style="border-top-right-radius:8px; border-bottom-right-radius:8px;">
                        Suivant
                    </a>
                </li>
            </ul>
        </nav>
    @endif
</div>
