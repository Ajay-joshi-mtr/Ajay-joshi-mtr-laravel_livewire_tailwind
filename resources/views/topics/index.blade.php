<div>
    @section('title')
    Topics
    @endsection

    @section('content-header')

    <div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
            Topics
        </x-content-header>

        @can('for-route', ['topics.create'])
        <a href="{{ route('topics.create') }}" class="float-right flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm mt-2 lg:-mb-32 lg:mr-2">Add New</a>
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

                <div class="relative">
                    <select wire:model="published" name="published" class="dark:text-gray-400 dark:border-gray-800 dark:bg-gray-800 h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-200 text-gray-500 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white ">
                        <option value="*">-- Status --</option>
                        <option value="1">Published</option>
                        <option value="0">Draft</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-600">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>

                <x-tables.search />
            </div>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                <x-tables.table2>
                    <x-slot name="thead">
                        <tr class="text-sm font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="text-left pl-4 pr-2 py-2" style="width: 4%;">#</th>
                            <th class="text-left px-2 py-2" style="width: 30%;">
                                <a href="#" wire:click.prevent="sortByDescDefault('title')"> Title </a>
                                <x-tables.sort-by-desc :sortField="$sortField" :sortDirectionDescDefault="$sortDirectionDescDefault" field="title" />
                            </th>
                            <th class="text-left px-2 py-2" style="width:21%">Research Area</th>
                            <th class="text-left px-2 py-2" style="width: 21%;">Domain</th>
                            <th class="text-center px-2 py-2 whitespace-nowrap" style="width: 14%;">
                                <a href="#" wire:click.prevent="sortByDescDefault('updated_at')">Status</a>
                                <x-tables.sort-by-desc :sortField="$sortField" :sortDirectionDescDefault="$sortDirectionDescDefault" field="created_at" />
                            </th>
                            <th class="text-center px-2 py-2 whitespace-nowrap" style="width: 10%;">Actions</th>
                            <!-- <th class="w-1/18 text-left pl-2 pr-4 py-2">Delete</th> -->
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @forelse($topics as $topic)
                        <tr class="text-sm text-left text-gray-500 tracking-wide border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td class="pl-4 pr-2 py-2">{{ $loop->iteration }}</td>
                            <td class="px-2 py-2 font-bold break-all">
                                @can('for-route', ['topics.view'])
                                <a href="{{ route('topics.view', $topic) }}" class="hover:text-purple-500">
                                    @endcan
                                    {{ $topic->title }}
                                    @can('for-route', ['topics.view'])
                                </a>
                                @endcan
                            </td>
                            <td class="px-2 py-2 break-all">
                                {{ ucfirst($topic->type->title ?? '') }}
                            </td>
                            <td class="px-2 py-2 break-all">
                                {{ ucfirst($topic->specialization->title ?? '') }}
                            </td>
                            <td class="px-2 text-center py-2 whitespace-nowrap">
                                <span class="px-2 py-1 font-semibold leading-tight text-purple-700 bg-purple-100 rounded-full dark:bg-purple-700 dark:text-purple-100 mt-1">{{ $topic->published ? 'Published' : 'Draft' }} On</span>
                                <div>{{ $topic->updated_at->format('d-M-Y') }}</div>
                            </td>
                            <td class="px-2 py-2 text-center whitespace-nowrap">
                                <span class="px-1">
                                    @can('for-route', ['topics.edit', $topic])
                                    <a href="{{ route('topics.edit', $topic) }}" class="text-sm font-medium text-purple-600 rounded-lg dark:text-purple-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </a>
                                    @endcan
                                </span>
                                <span class="px-1">
                                    <livewire:topic.delete-topic-component :topic="$topic" :key="time().'topic-'.$topic->id" />
                                </span>
                                @cannot('for-route', ['topics.edit', $topic])
                                @cannot('for-route', ['topics.delete', $topic])
                                <svg class="w-5 h-5 inline -ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                @endcannot
                                @endcannot
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-left px-2 col-span-6">No Result Found</td>
                        </tr>
                        @endforelse
                    </x-slot>
                </x-tables.table2>

            </div>

            <div class="grid px-4 py-3 text-sm font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    <x-tables.entries-data :data="$topics" />
                </span>
                <span class="col-span-2"></span>
                <x-tables.pagination :data="$topics" />
            </div>

        </div>
    </div>
</div>