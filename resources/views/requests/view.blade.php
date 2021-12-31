<div>
    @section('title')
    Request
    @endsection

    @section('content-header')

    <div class="flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
            Request Details
        </x-content-header>
        <a href="{{ route('requests.index') }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm mt-0 lg:mt-10">Back</a>
    </div>
    @endsection

    <x-savings.content>
        <x-slot name="card_body">

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">

                <div class="w-full lg:grid lg:grid-cols-10 lg:grid-rows-7 lg:gap-4">
                    <div class="px-3 lg:mb-4 lg:mb-4 lg:col-span-2">
                        <strong>
                            Requester
                        </strong>
                    </div>
                    <div class="px-3 mb-4 lg:mb-4 lg:col-span-8">
                        {{ $request->requester_name }}
                    </div>

                    <div class="px-3 lg:mb-4 lg:mb-4 lg:col-span-2">
                        <strong>
                            Contact No
                        </strong>
                    </div>
                    <div class="px-3 mb-4 lg:col-span-8">
                        {{ $request->requester_mobile }}
                    </div>

                    <div class="px-3 lg:mb-4 lg:mb-4 lg:col-span-2">
                        <strong>
                            Email
                        </strong>
                    </div>
                    <div class="px-3 mb-4 lg:col-span-8">
                        {{ $request->research_area }}
                    </div>

                    <div class="px-3 lg:mb-4 lg:mb-4 lg:col-span-2">
                        <strong>
                            Research Title
                        </strong>
                    </div>
                    <div class="px-3 mb-4 lg:col-span-8">
                        {{ $request->research_title }}
                    </div>

                    <div class="px-3 lg:mb-4 lg:mb-4 lg:col-span-2">
                        <strong>
                            Research Domain
                        </strong>
                    </div>
                    <div class="px-3 mb-4 lg:col-span-8">
                        {{ $request->research_domain }}
                    </div>

                    <div class="px-3 lg:mb-4 lg:mb-4 lg:col-span-2">
                        <strong>
                            Request Date
                        </strong>
                    </div>
                    <div class="px-3 mb-4 lg:col-span-8">
                        {{ $request->created_at->format('d/m/Y') }}
                    </div>

                    <div class="px-3 lg:mb-4 lg:mb-4 lg:col-span-2">
                        <strong>
                            Status
                        </strong>
                    </div>
                    <div class="px-3 mb-4 lg:col-span-8">
                        {{ $request->status?'Completed':'Processing' }}
                    </div>

                </div>

            </div>
        </x-slot>
    </x-savings.content>