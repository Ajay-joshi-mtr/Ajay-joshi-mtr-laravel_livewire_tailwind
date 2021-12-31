<div>
    @section('title')
    Download Requests
    @endsection

    @section('content-header')
    <div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
            Download Requests
        </x-content-header>
    </div>
    @endsection
    <div x-data="{showModal : false, deleteId : false}">
        @can('for-route', ['chapterRequests.approve'])
        <!-- clear requests buton     -->
        <a x-data x-on:click.prevent="confirm('Are you sure?') && $wire.clearInactiveRequests()" href="#" class="block lg:float-right flex-shrink-0 text-white bg-red-500 border-0 py-1 px-2 focus:outline-none hover:bg-red-600 rounded text-sm text-center lg:mt-0 lg:mr-4 mt-2 w-32">Clear Requests</a>
        @endcan
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
                            <th class="px-4 py-3 text-center">
                                #
                            </th>
                            <th class="px-4 py-3 text-center">
                                Requester
                                <x-tables.sort-by-desc :sortField="$sortField" :sortDirectionDescDefault="$sortDirectionDescDefault" field="title" />
                            </th>
                            @can('for-route', ['chapterRequests.approve'])
                            <th class="px-4 py-3 text-center">
                                Role
                                <x-tables.sort-by-desc :sortField="$sortField" :sortDirectionDescDefault="$sortDirectionDescDefault" field="title" />
                            </th>
                            @endcan
                            <th class="px-4 py-3 text-center">
                                Topic
                                <x-tables.sort-by-desc :sortField="$sortField" :sortDirectionDescDefault="$sortDirectionDescDefault" field="title" />
                            </th>
                            <th class="px-4 py-3 text-center">
                                Chapter
                                <x-tables.sort-by-desc :sortField="$sortField" :sortDirectionDescDefault="$sortDirectionDescDefault" field="title" />
                            </th>

                            @can('for-route', ['chapterRequests.approve'])
                            <th class="px-4 py-3 text-center">
                                Approver
                                <x-tables.sort-by-desc :sortField="$sortField" :sortDirectionDescDefault="$sortDirectionDescDefault" field="title" />
                            </th>
                            @endcan
                            <th class="px-4 py-3 text-center">
                                <a href="#" wire:click.prevent="sortByDescDefault('created_at')">
                                    Requested At
                                </a>
                                    <x-tables.sort-by-desc :sortField="$sortField" :sortDirectionDescDefault="$sortDirectionDescDefault" field="created_at" />
                            </th>
                            <th class="px-4 py-3 sorting text-center">
                                <a href="#" wire:click.prevent="sortByDescDefault('status')">

                                    Status

                                </a>
                                <x-tables.sort-by-desc :sortField="$sortField" :sortDirectionDescDefault="$sortDirectionDescDefault" field="description" />
                            </th>

                            <th class="px-4 py-3 text-center">
                                Action
                            </th>
                            @cannot('for-route',['chapterRequests.approve'])
                            <th class="px-4 py-3 text-center">
                                Delete
                            </th>
                            @endcannot
                        </tr>
                    </x-slot>

                    <x-slot name="tbody">
                        @can('for-route', ['chapterRequests.approve'])
                        @forelse($allChapterRequests as $chapterRequest)
                        <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td class="px-4 py-3 text-center">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 text-center">
                                <p class="font-semibold">{{ $chapterRequest->requester->full_name }}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    <!-- <span class="px-2 py-1 font-semibold text-xs leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        ( {{$chapterRequest->requester->role->name}} )
                                    </span> -->
                                </p>
                            </td>
                            <td class="px-4 py-3 text-xs text-center">
                                {{$chapterRequest->requester->role->name}}
                            </td>
                            <td class="px-4 py-3 text-xs text-center">
                                {{ ucwords($chapterRequest->chapter->topic->title ?? '' )}}
                            </td>
                            <td class="px-4 py-3 text-xs text-center">
                                {{ ucwords($chapterRequest->chapter->title ?? '' )}}
                            </td>
                            <td class="px-4 py-3 text-xs text-center">
                                {{ ucwords($chapterRequest->approver->full_name ?? 'No Action' )}}
                            </td>
                            <td class="px-4 py-3 text-xs text-center">{{ $chapterRequest->created_at->format('d-M-Y') }}</td>
                            <td class="px-4 py-3 text-xs text-center">
                                @switch($chapterRequest->status)
                                @case('pending')
                                <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                    Pending
                                </span>
                                @break

                                @case('approved')
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Approved
                                </span>
                                @break

                                @case('withdrawn')
                                <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                    Expired
                                </span>
                                @break

                                @case('rejected')
                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                    Rejected
                                </span>
                                @break

                                @case('cancelled')
                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                    Cancelled
                                </span>
                                @break

                                @default
                                NA
                                @endswitch
                            </td>
                            <td class="px-4 py-3 text-xs text-center">
                                @if ($chapterRequest->status=='pending')
                                <!-- accept buton     -->
                                <button wire:click="approveRequest({{ $chapterRequest->id }})" class="flex-shrink-0 text-white bg-green-500 border-0 py-1 px-2 mr-0 focus:outline-none hover:bg-green-600 rounded text-sm">
                                    Approve
                                </button>
                                <!-- reject buton     -->
                                <button wire:click="rejectRequest({{ $chapterRequest->id }})" class="flex-shrink-0 text-white bg-red-500 border-0 py-1 px-2 mr-0 focus:outline-none hover:bg-red-600 rounded text-sm">
                                    Reject
                                </button>
                                @elseif($chapterRequest->status=='approved')
                                <button wire:click="withdrawRequest({{ $chapterRequest->id }})" class="flex-shrink-0 text-white bg-blue-500 border-0 py-1 px-2 mr-0 focus:outline-none hover:bg-blue-600 rounded text-sm">
                                    Withdraw
                                </button>
                                @else
                                <div style="justify-content: center; display:flex; color:green">
                                    <livewire:chapter-request.delete-chapter-request-component :chapterRequest="$chapterRequest" :key="time().'chapterRequest-'.$chapterRequest->id" />
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg> -->
                                </div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td colspan="9" class="px-4 py-3">No results.</td>
                        </tr>
                        @endforelse
                        @else
                        @forelse($chapterRequests as $chapterRequest)
                        <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td class="px-4 py-3 text-center">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 text-center">
                                <p class="font-semibold">{{ $user->full_name }}</p>
                            </td>
                            <td class="px-4 py-3 text-xs text-center">
                                {{ ucwords($chapterRequest->chapter->topic->title ?? '' )}}
                            </td>
                            <td class="px-4 py-3 text-xs text-center">
                                {{ ucwords($chapterRequest->chapter->title ?? '' )}}
                            </td>
                            <td class="px-4 py-3 text-xs text-center">{{ $chapterRequest->created_at }}</td>
                            <td class="px-4 py-3 text-xs text-center">
                                @switch($chapterRequest->status)
                                @case('pending')
                                <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                    Pending
                                </span>
                                @break

                                @case('approved')
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Approved
                                </span>
                                @break

                                @case('withdrawn')
                                <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                    Expired
                                </span>
                                @break

                                @case('rejected')
                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                    Rejected
                                </span>
                                @break

                                @case('cancelled')
                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                    Cancelled
                                </span>
                                @break

                                @default
                                NA
                                @endswitch
                            </td>
                            <td class="px-4 py-3 text-xs text-center">
                                @if ($chapterRequest->status=='pending')
                                <button wire:click="cancelRequest({{ $chapterRequest->id }})" class="flex-shrink-0 text-white bg-red-500 border-0 py-1 px-2 focus:outline-none hover:bg-red-600 rounded text-sm">
                                    Cancel
                                </button>
                                @elseif ($chapterRequest->status=='approved')

                                <button wire:click="download({{$chapterRequest->chapter}})" class="flex-shrink-0 text-white bg-green-500 border-0 py-1 px-2 focus:outline-none hover:bg-green-600 rounded text-sm">
                                    Download
                                </button>
                                @else
                                <div style="justify-content: center; display:flex; color:green">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-xs text-center">
                                <livewire:chapter-request.delete-chapter-request-component :chapterRequest="$chapterRequest" :key="time().'chapterRequest-'.$chapterRequest->id" />
                            </td>

                        </tr>
                        @empty
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td colspan="9" class="px-4 py-3">No results.</td>
                        </tr>
                        @endforelse
                        @endcan
                    </x-slot>

                </x-tables.table>

            </div>

            @can('for-route', ['chapterRequests.approve'])
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    <x-tables.entries-data :data="$allChapterRequests" />
                </span>
                <span class="col-span-2"></span>
                <x-tables.pagination :data="$allChapterRequests" />
            </div>
            @else
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    <x-tables.entries-data :data="$chapterRequests" />
                </span>
                <span class="col-span-2"></span>
                <x-tables.pagination :data="$chapterRequests" />
            </div>
            @endcan
        </div>
    </div>
</div>