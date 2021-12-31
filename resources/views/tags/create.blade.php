<div>
    @section('title')
    Create New Keyword
    @endsection

    @section('content-header')

    <div class="flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
            Add New Keyword
        </x-content-header>
        <a href="{{ route('tags.index') }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm mt-2 lg:mt-10">Back</a>
    </div>
    @endsection

    <x-savings.content>
        <x-slot name="card_body">

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">
                <form method="POST" wire:submit.prevent="store">
                    @csrf
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                Title
                            </label>
                            <x-inputs.text key="tag.title" required="required" autofocus placeholder="" />
                            @error('tag.title') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                        </div>
                    </div>

                    <div class="-mx-3 md:flex mb-2">
                        <div class="md:w-1/2 px-3">
                            <x-inputs.button text="Create" />
                        </div>
                    </div>
                </form>
            </div>
        </x-slot>
    </x-savings.content>