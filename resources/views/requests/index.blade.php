<div>

    @section('title')
    Requests
    @endsection

    @section('content-header')

    <div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
            Requests
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
                <x-tables.table2>

                    <x-slot name="thead">
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3 w-1">
                                #
                            </th>
                            <th class="px-2 py-3">
                                <a href="#" wire:click.prevent="sortByDescDefault('requester_name')">
                                    Requester
                                </a>
                                <x-tables.sort-by-desc :sortField="$sortField" :sortDirectionDescDefault="$sortDirectionDescDefault" field="requester_name" />
                            </th>
                            <th class="px-2 py-3 w-24">
                                Mobile No
                            </th>
                            <!-- <th class="px-2 py-3">
                                <a href="#" wire:click.prevent="sortBy('research_area')">
                                    Email
                                </a>
                                <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="research_area" />
                            </th> -->
                            <th class="px-2 py-3">
                                <a href="#" wire:click.prevent="sortByDescDefault('research_title')">
                                    Research Title
                                </a>
                                <x-tables.sort-by-desc :sortField="$sortField" :sortDirectionDescDefault="$sortDirectionDescDefault" field="research_title" />
                            </th>

                            <th class="px-2 py-3">
                                <a href="#" wire:click.prevent="sortByDescDefault('research_domain')">
                                    Research Domain
                                </a>
                                <x-tables.sort-by-desc :sortField="$sortField" :sortDirectionDescDefault="$sortDirectionDescDefault" field="research_domain" />
                            </th>

                            <th class="px-2 py-3 w-28 text-center">
                                <a href="#" wire:click.prevent="sortByDescDefault('created_at')">
                                    Req. Date
                                </a>
                                <x-tables.sort-by-desc :sortField="$sortField" :sortDirectionDescDefault="$sortDirectionDescDefault" field="created_at" />
                            </th>
                            <th class="px-2 py-3 w-20">
                                Status
                            </th>
                            <th class="px-2 py-3 w-20">
                                Delete
                            </th>
                        </tr>
                    </x-slot>

                    <x-slot name="tbody">
                        @forelse($requests as $request)
                        <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-2 py-3">
                                @can('for-route', ['requests.view'])
                                <a href="{{ route('requests.view', $request) }}" class="hover:text-purple-500">
                                    @endcan
                                    <div>
                                        <p class="font-semibold">{{ $request->requester_name }}</p>
                                    </div>
                                    @can('for-route', ['requests.view'])
                                </a>
                                @endcan
                            </td>
                            <td class="px-2 py-3 truncate w-24 text-xs">{{ $request->requester_mobile }}</td>
                            <!-- <td class="px-2 py-3 truncate lowercase text-xs">{{ $request->research_area }}</td> -->
                            <td class="px-2 py-3 truncate text-xs">{{ $request->research_title }}</td>
                            <td class="px-2 py-3 truncate text-xs">{{ $request->research_domain }}</td>
                            <td class="px-2 py-3 truncate w-28 text-center text-xs">{{ $request->created_at->format('d/m/Y') }}</td>
                            <td class="px-4 py-3 text-xs">
                                <label for="toggleB{{$request->id}}" class="flex items-center cursor-pointer" style="cursor: pointer;">
                                    <div class="relative">
                                        <input type="checkbox" id="toggleB{{$request->id}}" class="sr-only" style="display:none;" wire:click="changeActiveStatus('{{$request->id}}')" {{ $request->status ?'checked':'' }}>
                                        <div class="block bg-gray-100 w-14 h-8 rounded-full" style="background-color: #cccccc; width:4em; height: 2em;"></div>
                                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition" style="margin-top: -2em; background-color:gray;"></div>
                                    </div>
                                    <!-- <div class="ml-4 text-gray-700 font-medium">
                                        @if ($request->status==0)
                                        Procssing
                                        @else
                                        Completed &nbsp;
                                        @endif
                                    </div> -->
                                </label>
                            </td>
                            <td class="px-2 py-3 text-xs w-20">
                                <livewire:request.delete-request-component :request="$request" :key="time().'request-'.$request->id" />
                            </td>

                        </tr>
                        @empty
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td colspan="6" class="px-4 py-3">No results.</td>
                        </tr>
                        @endforelse
                    </x-slot>

                </x-tables.table2>

            </div>

            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    <x-tables.entries-data :data="$requests" />
                </span>
                <span class="col-span-2"></span>
                <x-tables.pagination :data="$requests" />
            </div>

        </div>
    </div>
</div>