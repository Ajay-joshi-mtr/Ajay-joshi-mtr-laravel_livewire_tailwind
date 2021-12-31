<div>

    @section('title')
    Topic View
    @endsection

    @section('content-header')
    <div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
            Topic Details
            <span class="px-2 py-1 font-semibold text-lg leading-tight text-purple-700 bg-purple-100 rounded-full dark:bg-purple-700 dark:text-purple-100 mt-1">{{ $topic->published ? 'Published' : 'Draft' }}</span>
        </x-content-header>
        @can('for-route', ['topics.edit', $topic])
        <a href="{{ route('topics.edit', $topic) }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm mt-2 lg:mt-10 mr-4">Edit</a>
        @endcan
        <a href="{{ route('topics.index') }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm mt-2 lg:mt-10">Back</a>
    </div>
    @endsection

    <x-savings.content>
        <x-slot name="card_body">
            <div class="bg-white shadow-md flex flex-col rounded px-8 pt-6 pb-8 mb-4 my-2 dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">

                <div class="w-full overflow-hidden rounded-lg shadow-xs ">
                    <div class="w-full overflow-x-auto">
                        <x-tables.table1>
                            <x-slot name="thead_tfoot">
                            </x-slot>

                            <x-slot name="tbody">

                                <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3" style="width: 20%;"> Title </th>

                                    <td class="px-4 py-3"> {{ $topic['title'] }} </td>
                                </tr>

                                <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3"> Language </th>

                                    <td class="px-4 py-3"> {{ $languages[$topic['language']] }} </td>
                                </tr>

                                <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3"> Research Area </th>

                                    <td class="px-4 py-3"> {{ isset($topic->specialization->type['title'])?$topic->specialization->type['title']:'' }} </td>
                                </tr>

                                <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3"> Domain </th>

                                    <td class="px-4 py-3"> {{ isset($topic->specialization['title'])?$topic->specialization['title']:'' }} </td>
                                </tr>



                                <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Generate PDF</th>

                                    <td class="px-4 py-3 flex flex-wrap">
                                        @if ($topic->public_media_downloadable)


                                        <span class="mr-4">
                                            Enabled
                                        </span>
                                        <span>
                                            <a href="{{ route('topics.sample', $topic) }}" target="_blank" class="text-purple-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                </svg>
                                            </a>
                                        </span>
                                        @else
                                        <span class="mr-4">
                                            Disabled
                                        </span>
                                        @endif

                                    </td>
                                </tr>

                                <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3"> Featured Topic </th>

                                    <td class="px-4 py-3"> {{ $topic['featured']?'Yes':'No' }} </td>
                                </tr>

                                <tr class=" text-xs tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 uppercase py-3"> Keywords </th>

                                    <td class="px-4 capitalize py-3">
                                        <div>
                                            @if ($tags)
                                            <div class="dark:bg-gray-700  dark:text-gray-300">
                                                @foreach ($tags as $tag)
                                                <span>
                                                    <div class="inline-flex items-center capitalize rounded-lg bg-white border border-purple-400 dark:bg-gray-700 dark:border-purple-600 p-px">
                                                        <span class="px-2 py-1 text-sm "> {{ $tag->title }} </span>
                                                    </div>
                                                </span>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <tr class=" text-xs tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 uppercase py-3"> Short Description </th>

                                    <td class="px-4 py-3"> {{ $topic['short_description'] }} </td>
                                </tr>

                                <tr class=" text-xs tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 uppercase py-3"> Long Description </th>

                                    <td class="px-4 py-3 flex flex-wrap">
                                        {{ $topic['description'] }}
                                    </td>
                                </tr>

                                <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3"> Processing Image (Topic) </th>

                                    <td class="px-4 py-3 flex flex-wrap">
                                        @if($topicImage)
                                        <img src="{{ $topicImage }}" style="max-height: 24em;">
                                        @else
                                        <span class="mr-4"> Not Available </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3"> Featured Image (Research Area) </th>

                                    <td class="px-4 py-3 flex flex-wrap">
                                        @if($typeImage)
                                        <img src="{{ $typeImage }}" style="max-height: 24em;">
                                        @else
                                        <span class="mr-4"> Not Available </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3"> Domain Image </th>

                                    <td class="px-4 py-3 flex flex-wrap">
                                        @if($featuredImage)
                                        <img src="{{ $featuredImage }}" style="max-height: 24em;">
                                        @else
                                        <span class="mr-4"> Not Available </span>
                                        @endif
                                    </td>
                                </tr>
                            </x-slot>
                        </x-tables.table1>
                    </div>
                </div>


                <!-- SEO Settings -->
                <div class="w-full lg:mt-8 mb-6 mx-3" x-data="{open:false}">
                    <a href="#" @click="open = !open">
                        <div class="w-full px-4 py-3 border border-gray-200 rounded	bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            SEO Details
                        </div>
                    </a>

                    <div class="w-full overflow-hidden rounded-lg shadow-xs" x-show="open" x-transition:enter="fade">
                        <div class="w-full overflow-x-auto">
                            <x-tables.table1>
                                <x-slot name="thead_tfoot">
                                </x-slot>

                                <x-slot name="tbody">
                                    <tr class=" text-xs tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3 w-1/6"> Meta Title </th>
                                        <td class="px-4 py-3"> {{ $topic['meta_title'] }} </td>
                                    </tr>
                                    <tr class=" text-xs tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3"> Meta Tag </th>
                                        <td class="px-4 py-3"> {{ $topic['meta_tag'] }} </td>
                                    </tr>
                                    <tr class=" text-xs tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 capitalize py-3"> Meta Description </th>
                                        <td class="px-4 py-3"> {{ $topic['meta_description'] }} </td>
                                    </tr>
                                </x-slot>
                            </x-tables.table1>
                        </div>
                    </div>
                </div>
                <!-- SEO Settings Ends-->

                <!-- Chapters Field Starts -->
                <br>
                <label class="block uppercase tracking-wide text-grey-darker dark:text-gray-400 text-base font-bold mb-2">Topic Chapters</label>

                <div class="w-full overflow-hidden rounded-lg shadow-xs ">
                    <div class="w-full overflow-x-auto">
                        <x-tables.table1>

                            <x-slot name="thead_tfoot">
                            </x-slot>

                            <x-slot name="tbody">
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">
                                        #
                                    </th>
                                    <th class="py-3 w-1/5">
                                        Chapter Title
                                    </th>
                                    <th class="py-3 sorting">
                                        Chapter Description
                                    </th>
                                    @can('for-route', ['chapterRequests.index'])
                                    <th class="px-4 py-3 text-center">
                                        Status
                                    </th>
                                    <th class="px-4 py-3 text-center">
                                        Request
                                    </th>
                                    @endcan
                                </tr>
                                @forelse($chapters as $chapter)
                                <tr class=" text-xs tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="py-3">
                                        <div class="flex uppercase items-center text-sm">
                                            <div>
                                                <p class="font-semibold">{{ $chapter['title'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 text-xs">
                                        {{ $chapter['description'] }}
                                    </td>
                                    @can('for-route', ['chapterRequests.index'])
                                    <td class="px-4 py-3 text-xs text-center">
                                        @if ($chapter->chapterRequest($user_id))
                                        @switch($chapter->chapterRequest($user_id)->status)
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
                                        No Request
                                        @endswitch
                                        @else
                                        No Request
                                        @endif
                                    </td>
                                    @endcan
                                    @can('for-route', ['chapterRequests.index'])
                                    <td class="px-4 py-3 text-xs text-center">
                                        @if ($chapter->media)
                                        @if ($chapter->chapterRequest($user_id))
                                        @if ($chapter->chapterRequest($user_id)->status=='pending')
                                        <button wire:click="cancelRequest({{$chapter['id']}})" class="flex-shrink-0 text-white bg-red-500 border-0 py-1 px-2 focus:outline-none hover:bg-red-600 rounded text-sm">
                                            Cancel
                                        </button>
                                        @elseif ($chapter->chapterRequest($user_id)->status=='approved')
                                        <button wire:click="download({{$chapter}})" class="flex-shrink-0 text-white bg-green-500 border-0 py-1 px-2 focus:outline-none hover:bg-green-600 rounded text-sm">
                                            Download
                                        </button>
                                        @else
                                        <button wire:click="sendRequest({{$chapter['id']}})" class="flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm">
                                            Request
                                        </button>
                                        @endif
                                        @else
                                        <button wire:click="sendRequest({{$chapter['id']}})" class="flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm">
                                            Request
                                        </button>
                                        @endif
                                        @else
                                        No Media
                                        @endif
                                    </td>
                                    @endcan
                                </tr>
                                @empty
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <td colspan="5" class="px-4 py-3">No results.</td>
                                </tr>
                                @endforelse
                            </x-slot>
                        </x-tables.table1>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-savings.content>

</div>