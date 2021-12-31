<div>
    @section('title')
    Permissions
    @endsection

    @section('content-header')

    <div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
            Permissions
        </x-content-header>
       
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
                <x-tables.table>

                    <x-slot name="thead_tfoot">
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">
                                #
                            </th>
                            <th class="px-4 py-3">
                                <a href="#" wire:click.prevent="sortBy('group')">Group</a>
                                <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="title" />
                            </th>
                            <th class="px-4 py-3">
                                <a href="#" wire:click.prevent="sortBy('name')">Name</a>
                                <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="title" />
                            </th>
                            <th class="px-4 py-3 sorting">
                                <a href="#" wire:click.prevent="sortBy('description')">Description</a>
                                <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="description" />

                            </th>
                            <th class="px-4 py-3">
                                <a href="#" wire:click.prevent="sortBy('created_at')">Created At</a>
                                <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="created_at" />

                            </th>
                        </tr>
                    </x-slot>

                    <x-slot name="tbody">
                        @forelse($permissions as $permission)                        
                        <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $permission->group }}</p>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="px-4 py-3 text-xs">
                                {{ ucwords($permission->name ?? '' )}}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                {{ ucwords($permission->description ?? '' )}}
                            </td>
                            
                            <td class="px-4 py-3 text-xs">{{ $permission->created_at->format('d-M-Y') }}</td>
                           
                          

                        </tr>
                        @empty
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td colspan="7" class="px-4 py-3">No results.</td>
                        </tr>
                        @endforelse
                    </x-slot>

                </x-tables.table>

            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    <x-tables.entries-data :data="$permissions" />
                </span>
                <span class="col-span-2"></span>
                <x-tables.pagination :data="$permissions" />
            </div>

        </div>
    </div>
</div>
