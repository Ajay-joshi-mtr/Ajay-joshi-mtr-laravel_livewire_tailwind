<div>
    @section('title')
    Edit Research Area
    @endsection

    @section('content-header')
    <div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
            Edit Research Area
        </x-content-header>
        <a href="{{ route('types.index') }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm lg:mt-10 mt-2">Back</a>
    </div>
    @endsection

    <x-savings.content>
        <x-slot name="card_body">

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">
                <form method="POST" wire:submit.prevent="update">
                    @csrf
                    <div class="md:w-1/2 px-3 mb-6 md:mb-4">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                            Title
                        </label>
                        <x-inputs.text key="type.title" required="required" autofocus placeholder="" />
                        @error('type.title') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                    </div>
                    <div class="md:w-full px-3 mb-4">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                            Description
                        </label>
                        <x-inputs.textareashort key="type.description" autofocus placeholder="Describe Type" />
                        @error('type.description') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                    </div>
                    <div class="md:flex mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                            Featured Image
                            </label>
                            <div style="border: 2px dashed gray; padding:4px;">
                                <label x-data="{ files: null }" class="block uppercase tracking-wide text-grey-darker dark:text-gray-400 text-xs font-bold mb-2">
                                    <input x-on:change="files = Object.values($event.target.files)" type="file" wire:model="typeImage" class="opacity-0" style="height: 4em;" />
                                    <div style="margin-top: -4em;">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.5em; display:inline;" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                        </span>
                                        <span x-text="files ? files.map(file => file.name).join(', ') : 'Choose New File'"></span>
                                    </div>
                                    @error('typeImage') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-2/5 px-3 align-top lg:inline-block">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                        Featured Image
                        </label>
                        @if ($typeImage)
                        <img src="{{ $typeImage->temporaryUrl() }}" alt="No Image Found" style="max-height:13em;">
                        @else
                        <img src="{{ $type->media ? asset('/storage'.$this->type->media->path) : '' }}" alt="No Image Found" style="max-height:13em;">
                        @endif
                    </div>
                    <div class="w-full ml-4">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                            Add Domains
                        </label>
                        <div class="lg:w-2/5 w-3/5 inline-block">
                            <x-inputs.text key="newDomain" wire:model="newDomain" autofocus placeholder="" />
                        </div>
                        <div class="w-1/4 inline-block">
                            <button wire:click.prevent="addSpecialization()" class="inline flex-shrink-0 text-white bg-purple-500 border-0 py-2 px-3 focus:outline-none hover:bg-purple-600 rounded text-sm mt-2">+</button>
                        </div>
                    </div>
                    <div class="w-full ml-5 lg:mt-4">
                        <ul>
                            @foreach ($specializations as $specialization)
                            <li>
                                <div class="inline-block my-2">
                                    + {{$specialization->title}}
                                </div>
                                <div class="inline-block">
                                    <button wire:click.prevent="removeSpecialization({{$specialization->id}})" class="inline flex-shrink-0 text-white border-0 px-3 focus:outline-none text-red-500 rounded text-sm mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="ml-1 md:flex mt-4 mb-2">
                        <div class="md:w-1/2 px-3">
                            <x-inputs.button text="update" />
                        </div>
                    </div>
                </form>
            </div>
        </x-slot>
    </x-savings.content>