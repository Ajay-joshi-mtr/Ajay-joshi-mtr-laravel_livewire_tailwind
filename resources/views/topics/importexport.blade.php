<div>

    @section('title')
    Topics Import/Export
    @endsection

    @section('content-header')
    <div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
            Topics Import/Export
        </x-content-header>
        <a href="{{ route('topics.index') }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm mt-2 lg:mt-10">Back</a>
    </div>
    @endsection



    <x-savings.content>
        <x-slot name="card_body">
            <div class="bg-white shadow-md flex flex-col rounded px-8 pt-6 pb-8 mb-4 my-2 dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">

                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="md:flex mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <!-- <div class="md:flex lg:mb-6 mt-4">
                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                        Research Area
                                    </label>
                                    <x-inputs.dropdown key="type_id" wire:model="type_id" :options="$types" textField="title" required="" />
                                    @error('type_id') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                                </div>
                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                        Domain
                                    </label>
                                    <x-inputs.dropdown key="specialization_id" :options="$specializations" textField="title" required="required" />
                                    @error('specialization_id') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                                </div>
                            </div> -->
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                Upload Excel File
                            </label>
                            <div style="border: 2px dashed gray; padding:4px;" class="">
                                <label x-data="{ files: null }" class="block uppercase tracking-wide text-grey-darker dark:text-gray-400 text-xs font-bold mb-2">
                                    <input x-on:change="files = Object.values($event.target.files)" type="file" required="required" name="file" id="customFile" class="opacity-0" style="height: 4em;;" />
                                    <div style="margin-top: -4em;">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.5em; display:inline;" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                        </span>
                                        <span x-text="files ? files.map(file => file.name).join(', ') : 'Choose New File'"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="ml-2 md:flex mb-2">
                        <button class="flex-shrink-0 mr-4 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm">Import data</button>
                        <a href="{{ route('file-export') }}" class="flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm">Export</a>
                    </div>
                </form>
            </div>
        </x-slot>
    </x-savings.content>

</div>