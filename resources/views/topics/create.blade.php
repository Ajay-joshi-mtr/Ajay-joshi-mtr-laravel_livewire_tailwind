<div>
    @section('title')
    Create New Topic
    @endsection

    @section('content-header')

    <div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
            Add New
        </x-content-header>
        <a href="{{ route('topics.index') }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm lg:mt-10 mt-2 lg:mr-4">Back</a>
    </div>
    @endsection

    <x-savings.content>
        <x-slot name="card_body">
            <div x-data="{txtField: '', txtType:''}">
                <form method="POST" wire:submit.prevent="store" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="bg-white w-full inline-block shadow-md rounded px-8 pt-6 pb-1 lg:pb-8 mb-2 flex flex-col my-2 dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">

                        <div class="md:w-3/4 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                Title
                                <x-inputs.text key="topic.title" required="required" autofocus placeholder="" />
                                @error('topic.title') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                            </label>
                        </div>

                        <div class="md:flex mt-6">
                            <div class="md:w-1/2 px-3 lg:mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                    Research Area
                                </label>
                                <x-inputs.dropdown key="topic.type_id" wire:model="typeTerm" :options="$types" textField="title" required="" />
                                @error('topic.type_id') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                            </div>
                            <div class="md:w-1/2 px-3 lg:mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                    Domain
                                </label>
                                <x-inputs.dropdown key="topic.specialization_id" :options="$specializations" textField="title" required="" />
                                @error('topic.specialization_id') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                            </div>
                        </div>

                        <div class="md:w-full px-3 mt-6">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                Short Description
                            </label>
                            <x-inputs.textareashort key="topic.short_description" autofocus placeholder="Short Decription" />
                            @error('topic.short_description') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                        </div>

                        <div class="md:w-full my-6 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                Long Description
                            </label>
                            <x-inputs.textarealong key="topic.description" autofocus placeholder="Long Decription" />
                            @error('topic.description') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                        </div>

                        <div class="md:w-full px-4">
                            <div class="w-full mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                    Processing Image
                                </label>
                                <div style="border: 2px dashed gray; padding:4px;">
                                    <label x-data="{ files: null }" class="block uppercase tracking-wide text-grey-darker dark:text-gray-400 text-xs font-bold mb-2">
                                        <input x-on:change="files = Object.values($event.target.files)" type="file" wire:model="topicImage" class="opacity-0" style="height: 4em;;" />
                                        <div style="margin-top: -4em;">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.5em; display:inline;" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                </svg>
                                            </span>
                                            <span x-text="files ? files.map(file => file.name).join(', ') : 'Choose New File'"></span>
                                        </div>
                                        @error('topicImage') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if($topicImage)
                        <div class="w-full px-4 mt-4">
                            <img src="{{ $topicImage ? $topicImage->temporaryUrl():'' }}" alt="No Image Found" style="max-height:13em;">
                        </div>
                        @endif

                        <div class="md:flex mb-4 mt-8">

                            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                    Language
                                </label>
                                <x-inputs.dropdownFromArray key="topic.language" :options="$languages" textField="array_values($languages)" required="" />
                                @error('topic.language') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                            </div>

                            <div class="lg:w-1/2 px-3 mb-4">

                                <div class="lg:inline-block">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-4" for="">
                                        Generate PDF
                                    </label>
                                    <label for="toggleB" class="flex mt-2 items-center cursor-pointer" style="cursor: pointer;">
                                        <div class="relative">
                                            <input type="checkbox" id="toggleB" class="sr-only" style="display:none;" wire:click="changeActiveStatus()" {{ $publicMediaDownloadable ?'checked':'' }}>
                                            <div class="block bg-gray-100 w-14 h-8 rounded-full" style="background-color: #cccccc; width:3em; height: 1.6em;"></div>
                                            <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition" style="margin-top: -1.6em; background-color:gray;"></div>
                                        </div>
                                        <div class="ml-4 text-gray-700 dark:text-gray-400 font-medium">
                                            @if ($publicMediaDownloadable)
                                            Active &nbsp;&nbsp;
                                            @else
                                            Inactive
                                            @endif
                                        </div>
                                    </label>
                                </div>

                                <div class="lg:inline-block lg:px-12 mt-8 lg:mt-0">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold lg:mb-6 mb-2" for="">
                                        Mark as Featured
                                    </label>
                                    <input type="checkbox" class="w-5 h-5 mr-1" id="" name="" value="1" wire:model="topic.featured" /> <span class="text-lg">Featured Topic</span>
                                </div>

                            </div>

                        </div>



                        <!-- Tag Chip Starts -->
                        <div class="md:flex mb-2 mt-0">
                            <div class="md:w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                    Keywords
                                </label>
                                <div>
                                    <div class="chips-container dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray" style="min-height: 3em;">
                                        <template x-for="(tag, index) in $wire.tags">
                                            <span>
                                                <div class="m-1 inline-flex items-center rounded-lg bg-white border border-purple-500 dark:bg-gray-700 dark:border-gray-600 p-px">
                                                    <span class="px-2 py-0.5 text-sm " x-text="tag"></span>
                                                    <!-- <span class="px-2 py-1 text-sm " x-text="index"></span> -->
                                                    <button x-on:click.prevent="$wire.removeTag(index)" type="button" class="h-6 w-6 p-1 rounded-full bg-red-400 bg-opacity-25 focus:outline-none">
                                                        <svg class="text-red-500 text-opacity-75" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </span>
                                        </template>
                                        <span>
                                            <input x-on:keydown.enter.prevent="[$wire.addTag(txtField), txtField='']" class="w-full chips-input dark:bg-gray-700 dark:text-gray-300" type="text" id="textField" wire:model="searchTerm" x-model="txtField" placeholder="Add Keywords">
                                        </span>
                                        @if ($searchTerm!="")
                                        @if ($dbTags->count()!=0)
                                        <div class="mt-1 border-t border-solid border-gray-600 pt-1">
                                            @foreach ($dbTags as $dbTag)
                                            <span>
                                                <div class="inline-flex items-center rounded-lg bg-white border border-purple-500 dark:border-purple-600 p-px mb-2 dark:bg-gray-700" style="cursor: pointer;">
                                                    <span class="py-0.5 text-sm">
                                                        <a href="#" x-on:click.prevent="txtField=''" wire:click.prevent="addTag('{{$dbTag->title}}')" class="block py-0.5 px-2 cursor-pointer">{{ $dbTag->title }}</a>
                                                    </span>
                                                </div>
                                            </span>
                                            @endforeach
                                        </div>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                                @error('dbTags.title') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                            </div>
                        </div>
                        <!-- Tag Chip Ends -->


                        <!-- SEO Settings -->
                        <div class="w-full mt-4 lg:mt-0 mb-6 mx-3" x-data="{open:false}">
                            <a href="#" @click="open = !open">
                                <div class="w-full px-4 py-3 border border-gray-200 rounded	bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    SEO Settings
                                </div>
                            </a>

                            <div class="w-full" x-show="open" x-transition:enter="fade">
                                <div class="lg:w-3/4 mt-4">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                        Meta Title
                                        <x-inputs.text key="topic.meta_title" autofocus placeholder="" />
                                        @error('topic.meta_title') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                                    </label>
                                </div>
                                <div class="lg:w-3/4 mt-4">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                        Meta Tag
                                        <x-inputs.text key="topic.meta_tag" autofocus placeholder="" />
                                        @error('topic.meta_tag') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                                    </label>
                                </div>
                                <div class="mt-4">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                        Meta Description
                                    </label>
                                    <x-inputs.textareashort key="topic.meta_description" autofocus placeholder="" />
                                    @error('topic.meta_description') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                                </div>
                            </div>
                        </div>
                        <!-- SEO Settings Ends-->
                    </div>


                    <!-- Chapters Field Starts -->
                    <div style="display: inline-block;" class="w-full bg-white inline-block shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">
                        <label class="block uppercase tracking-wide text-grey-darker dark:text-gray-400 text-base font-bold mb-2">Add Chpters</label>
                        @foreach($inputs as $key => $value)
                        <div class="-mx-3 md:flex mb-16 lg:mb-6">
                            <div class="md:w-full px-3 mb-4">
                                <label class="block uppercase tracking-wide text-grey-darker dark:text-gray-400 text-xs font-bold mb-2">
                                    Title
                                </label>
                                <input type="text" wire:model="chapterTitle.{{ $value }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input form-control" placeholder="Enter Title" required>
                                @error('chapterTitle.'.$value) <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                            </div>
                            <div class="md:w-full px-3 mb-4">
                                <label class="block uppercase tracking-wide text-grey-darker dark:text-gray-400 text-xs font-bold mb-2" for="grid-password">
                                    Description
                                </label>
                                <x-inputs.textarea key="chapterDescription.{{ $value }}" autofocus placeholder="Enter Description" />
                                @error('chapterDescription.'.$value) <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                            </div>
                            <div class="md:w-1/2 px-3 mb-0">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                    Media
                                </label>
                                <div class="border-dashed border-gray-400 border-2 p-2">
                                    <label x-data="{ files: null }" class="block uppercase tracking-wide text-grey-darker dark:text-gray-400 text-xs font-bold mb-2" for="grid-password">
                                        <input x-on:change="files = Object.values($event.target.files)" type="file" wire:model="chapterMedia.{{ $value }}" accept=".doc,.docx,.zip,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="opacity-0" style="height: 4em;;" />
                                        <div style="margin-top: -4em;">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.5em; display:inline;" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                </svg>
                                            </span>
                                            <span x-text="files ? files.map(file => file.name).join(', ') : 'Choose New File'"></span>
                                        </div>
                                        @error('chapterMedia.'.$value) <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                                    </label>
                                </div>
                            </div>
                            <div class="md:w-1/6 px-3 mb-6 md:mb-0 -mt-4">
                                <button wire:click.prevent="remove({{ $key }})" class="float-right flex-shrink-0 text-red-500 border-0 py-2 px-3 mt-4 lg:mt-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @endforeach

                        <div class="md:flex mb-6">
                            <button wire:click.prevent="add({{$i}})" class="flex-shrink-0 text-white bg-blue-500 border-0 lg:py-1 py-2 px-3 focus:outline-none hover:bg-blue-600 rounded text-sm lg:mb-0 mb-2">+ Add New Chapter</button>
                            <div class="md:w-1/2 px-3 -mt-2 -ml-3 lg:ml-2">
                                <x-inputs.button text="Save Topic" />
                            </div>
                        </div>
                    </div>
                    <!-- Chapter Ends -->

                </form>
            </div>
        </x-slot>
    </x-savings.content>
</div>

<script>
    $(function() {
        $('#dropdown').hover(function() {
                $(this).attr('size', $('option').length);
            },
            function() {
                $(this).attr('size', 1);
            });
    });
</script>