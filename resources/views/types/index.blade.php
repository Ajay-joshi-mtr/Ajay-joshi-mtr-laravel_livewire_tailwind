<div>
    @section('title')
    Research Areas
    @endsection

    @section('content-header')

    <div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
            Research Areas
        </x-content-header>

        @can('for-route', ['types.create'])
        <a href="{{ route('types.create') }}" class="float-right flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm mt-2 lg:-mb-32 lg:mr-2">Add New</a>
        @endcan
    </div>
    @endsection
    <div x-data="{showModal : false, deleteId : false}">
        <div class="my-2 flex sm:flex-row flex-col">
            <div class="flex flex-row mb-1 sm:mb-0">
                <div class="relative">
                    <x-tables.per-page />

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-600">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>


                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-600">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>

                <x-tables.search />
            </div>

        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs ">
            <div class="w-full overflow-x-auto">


                <x-tables.table2>
                    <x-slot name="thead">
                        <tr class="text-sm font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="text-left pl-4 pr-2 py-2" style="width: 4%;">#</th>
                            <th class="text-left px-2 py-2" style="width: 33%;">
                                <a href="#" wire:click.prevent="sortBy('title')"> Title </a>
                                <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="title" />
                            </th>
                            <th class="text-left px-2 py-2" style="width: 5%;">Image</th>
                            <th class="text-center px-2 py-2" style="width: 5%;">Topics</th>
                            <th class="text-center px-2 py-2 whitespace-nowrap" style="width: 15%;">
                                <a href="#" wire:click.prevent="sortBy('created_at')"> Created At </a>
                                <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="created_at" />
                            </th>
                            <th class="text-center px-2 py-2 whitespace-nowrap" style="width: 10%;">Actions</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @forelse($types as $type)
                        <tr class="text-sm text-left text-gray-500 tracking-wide border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td class="pl-4 pr-2 py-2">{{ $loop->iteration }}</td>
                            <td class="px-2 py-2 font-bold break-all"> {{ $type->title ?? '' }} </td>
                            <th class="text-center px-2 py-2" style="width: 5%;">
                                <div class="relative self-center hidden w-8 h-8 mr-3 rounded-full md:block">
                                    @if($type->media)
                                    <img class="object-cover self-center w-full h-full rounded-full" src="{{ asset('storage'.$type->media->path) }}" alt="" loading="lazy" />
                                    @else
                                    -
                                    <!-- <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" /> -->
                                    @endif
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                            </th>
                            <td class="px-2 py-2 text-center">
                                <span class="px-2 py-1 font-semibold leading-tight text-purple-700 bg-purple-100 rounded-full dark:bg-purple-700 dark:text-purple-100">
                                    {{ $type->topics->count() ?? 0 }}
                                </span>
                            </td>
                            <td class="px-2 text-center py-2 whitespace-nowrap">{{ $type->created_at->format('d-M-Y') }}</td>
                            <td class="px-2 py-2 text-center whitespace-nowrap">
                                @can('for-route', ['types.edit', $type])
                                <span class="px-1">
                                    <a href="{{ route('types.edit', $type) }}" class="text-sm font-medium text-purple-600 rounded-lg dark:text-purple-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </a>
                                </span>
                                @endcan
                                <span class="px-1">
                                    <livewire:type.delete-type-component :type="$type" :key="time().'type-'.$type->id" />
                                </span>

                                @cannot('for-route', ['types.edit', $type])
                                @cannot('for-route', ['types.delete', $type])
                                <svg class="w-5 h-5 inline -ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                @endcannot
                                @endcannot
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-left px-2 col-span-5">No Result Found</td>
                        </tr>
                        @endforelse

                    </x-slot>
                </x-tables.table2>
            </div>

            <div class="grid px-4 py-3 text-sm font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    <x-tables.entries-data :data="$types" />
                </span>
                <span class="col-span-2"></span>
                <x-tables.pagination :data="$types" />
            </div>

        </div>


    </div>
</div>