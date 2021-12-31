<div>

    @section('title')
    Research Area View
    @endsection

    @section('content-header')
    <div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
            Research Area Details
        </x-content-header>
        @can('for-route', ['types.edit', $type])
        <a href="{{ route('types.edit', $type) }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm mt-2 lg:mt-10 mr-4">Edit</a>
        @endcan
        <a href="{{ route('types.index') }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm mt-2 lg:mt-10">Back</a>
    </div>
    @endsection

    <x-savings.content>
        <x-slot name="card_body">
            <div class="bg-white shadow-md flex flex-col rounded px-8 pt-6 pb-8 mb-4 my-2 dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">

                <div class="w-full overflow-hidden rounded-lg shadow-xs ">
                    <div class="w-full overflow-x-auto">
                    <label class="block uppercase tracking-wide text-grey-darker dark:text-gray-400 text-base font-bold mb-2"> {{ $type->title }} </label>
                        <ul class="mx-4">
                            @foreach ($type->specializations as $index=>$specialization)
                            <li> + {{ $specialization->title }} </li>
                            @endforeach
                           
                        </ul>
                    </div>
                </div>


            </div>
        </x-slot>
    </x-savings.content>

</div>