<div>
    @section('title')
    Edit Existing Webhook
    @endsection

    @section('content-header')
    <div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
            Edit Webhook
        </x-content-header>
        <a href="{{ route('webhooks.index') }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm lg:mt-10">Back</a>
    </div>
    @endsection

    <x-savings.content>
        <x-slot name="card_body">

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">
                <form method="POST" wire:submit.prevent="update">
                    @csrf
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                Title
                            </label>
                            <x-inputs.text key="webhook.title" required="required" autofocus placeholder="" />
                            @error('webhook.title') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                URL
                            </label>
                            <x-inputs.text key="webhook.url" required="required" autofocus placeholder="" />
                            @error('webhook.url') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                Description
                            </label>
                            <x-inputs.textarea key="webhook.description" autofocus placeholder="Describe Webhook" />
                            @error('webhook.description') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                Status
                            </label>
                            <x-inputs.dropdownFromArray key="webhook.active_status" :options="$status" textField="array_values($status)" required="" />
                            @error('webhook.active_status') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
                        </div>
                    </div>

                    <div class="-mx-3 md:flex mb-2">
                        <div class="md:w-1/2 px-3">
                            <x-inputs.button text="update" />
                        </div>
                    </div>
                </form>
            </div>
        </x-slot>
    </x-savings.content>