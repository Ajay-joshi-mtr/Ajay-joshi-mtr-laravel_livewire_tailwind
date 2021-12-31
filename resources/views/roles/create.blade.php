@section('title')
Create New Role
@endsection

@section('content-header')
<div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
    <x-content-header>
        Create New Role
    </x-content-header>
    <a href="{{ route('roles.index') }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm lg:mt-10 lg:-mb-2 mb-4">Back</a>
</div>
@endsection

<x-savings.content>
    <x-slot name="card_header">
        <h3 class="card-title">Create New Role</h3>
        <a href="{{ route('roles.index') }}" class="float-right">Back</a>
    </x-slot>

    <x-slot name="card_body">
        <form wire:submit.prevent="store" method="POST">
            @csrf
            <label>Role Name</label>
            <x-inputs.text key="role.name" autofocus placeholder="{{ trans('validation.attributes.role') }}" />
            <div class="mb-4"></div>
            <label>Label</label>
            <x-inputs.text key="role.label" required="required" placeholder="{{ trans('validation.attributes.label') }}" />
            
            <!-- <h1 class="text-center mt-6 font-bold text-lg">Assign Permissions</h1> -->

            <div class="bg-white shadow-md flex flex-col rounded px-8 pt-6 pb-8 mb-4 my-2 dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">
                <label class="block uppercase tracking-wide text-grey-darker dark:text-gray-400 text-base font-bold mb-2">Assign Permissions</label>

                <div class="w-full overflow-hidden rounded-lg shadow-xs ">
                    <div class="w-full overflow-x-auto">
                        <x-tables.table1>

                            <x-slot name="thead_tfoot">
                            </x-slot>

                            <x-slot name="tbody">
                                @foreach($permissionGroups as $group => $permissions)
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">
                                        {{ ucwords($group ?? '') }}
                                    </th>
                                    @foreach($permissions as $id => $permission)
                                    <td class="px-4 py-3">
                                        <label class="form-check-label">
                                            <input wire:model="permissions.{{ $id }}.allowed" class="permission-{{ $group }}" type="checkbox" value="1">
                                            {{ $permission['description'] ?? '' }}
                                        </label>
                                    </td>
                                    @endforeach
                                    <th class="px-4 py-3">
                                        <div class="form-check">
                                            <label class="form-check-label" for="select-all-permissions-{{ $group }}" title="Select All">
                                                <input id="select-all-permissions-{{ $group }}" class="form-check-input" type="checkbox" value="1" @click="
                                                    for(i in document.getElementsByClassName('permission-{{ $group }}')) {
                                                        document.getElementsByClassName('permission-{{ $group }}')[i].checked = $event.target.checked
                                                    }
                                                ">
                                                Select All
                                            </label>
                                        </div>
                                    </th>
                                </tr>
                                @endforeach
                            </x-slot>
                        </x-tables.table1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="offset-8 col-4">
                    <x-inputs.button text="Save" class="btn-success" />
                </div>
            </div>
        </form>
    </x-slot>
</x-savings.content>