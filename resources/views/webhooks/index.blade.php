<div>
    @section('title')
    Webhooks
    @endsection

    @section('content-header')

    <div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
            Webhooks
        </x-content-header>

        @can('for-route', ['webhooks.create'])
        <a href="{{ route('webhooks.create') }}" class="float-right flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm mt-0 lg:mt-10">Add New</a>
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
                <x-tables.table>

                    <x-slot name="thead_tfoot">
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">
                                #
                            </th>
                            <th class="px-4 py-3">
                                <a href="#" wire:click.prevent="sortBy('title')">Title</a>
                                <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="title" />
                            </th>
                            <!-- <th class="px-4 py-3 sorting">
                                <a href="#" wire:click.prevent="sortBy('description')">Description</a>
                                <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="description" />
                            </th> -->
                            <th class="px-4 py-3">
                                <a href="#" wire:click.prevent="sortBy('created_at')">Created At</a>
                                <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="created_at" />

                            </th>

                            <th class="px-4 py-3">
                                Trigger
                            </th>
                            <th class="px-4 py-3">
                                Change Status
                            </th>
                            <th class="px-4 py-3">
                                Edit
                            </th>
                            <th class="px-4 py-3">
                                Delete
                            </th>
                        </tr>
                    </x-slot>

                    <x-slot name="tbody">
                        @forelse($webhooks as $webhook)
                        <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $webhook->title }}</p>
                                    </div>
                                </div>
                            </td>
                            <!-- <td class="px-4 py-3 text-xs">
                                {{ ucwords($webhook->description ?? '' )}}
                            </td> -->
                            <td class="px-4 py-3 text-xs">{{ $webhook->created_at->format('d-M-Y') }}</td>
                            <td class="px-4 py-3 text-xs">
                                <button wire:click="trigger('{{$webhook->url}}')" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-purple-400 focus:outline-none focus:shadow-outline-gray cursor-pointer" aria-label="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <label for="toggleB{{$webhook->id}}" class="flex items-center cursor-pointer" style="cursor: pointer;">
                                    <div class="relative">
                                        <input type="checkbox" id="toggleB{{$webhook->id}}" class="sr-only" style="display:none;" wire:click="changeActiveStatus('{{$webhook->id}}')" {{ $webhook->active_status ?'checked':'' }}>
                                        <div class="block bg-gray-100 w-14 h-8 rounded-full" style="background-color: #cccccc; width:4em; height: 2em;"></div>
                                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition" style="margin-top: -2em; background-color:gray;"></div>
                                    </div>
                                    <div class="ml-4 text-gray-700 font-medium">
                                        @if ($webhook->active_status==0)
                                        Inactive
                                        @else
                                        Active &nbsp;&nbsp;
                                        @endif
                                    </div>
                                </label>



                                <!-- <button wire:click="changeActiveStatus('{{$webhook->id}}')" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-purple-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button> -->
                            </td>
                            <td class="px-4 py-3 text-xs">
                                @can('for-route', ['webhooks.edit', $webhook])
                                <a href="{{ route('webhooks.edit', $webhook) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-purple-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                @endcan
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <livewire:webhook.delete-webhook-component :webhook="$webhook" :key="time().'webhook-'.$webhook->id" />
                            </td>

                        </tr>
                        @empty
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td colspan="8" class="px-4 py-3">No results.</td>
                        </tr>
                        @endforelse
                    </x-slot>

                </x-tables.table>

            </div>

            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    <x-tables.entries-data :data="$webhooks" />
                </span>
                <span class="col-span-2"></span>
                <x-tables.pagination :data="$webhooks" />
            </div>

        </div>


    </div>
</div>