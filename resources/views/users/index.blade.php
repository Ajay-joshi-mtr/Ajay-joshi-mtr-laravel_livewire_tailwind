<div>
  @section('title')
  Users
  @endsection

  @section('content-header')

  <div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
    <x-content-header>
      Users
    </x-content-header>

    @can('for-route', ['users.create'])
    <a href="{{ route('users.create') }}" class="float-right flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm mt-0 lg:mt-10">Add New</a>
    @endcan
  </div>
  @endsection
  <div x-data="{showModal : false, deleteId : false}">
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
          <select wire:model="roleId" name="roleId" class="dark:text-gray-400 dark:border-gray-800 dark:bg-gray-800 h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-200 text-gray-500 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white ">
            <option value="">-- Role --</option>
            @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ ucwords($role->name ?? '') }}</option>
            @endforeach
          </select>
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
              <th class="px-4 py-3">
                #
              </th>
              <th class="px-4 py-3">
                <a href="#" wire:click.prevent="sortBy('full_name')">
                  Name
                </a>
                <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="full_name" />
              </th>
              <th class="px-4 py-3 text-center">
                Role
              </th>
              <th class="px-4 py-3 text-center sorting">
                <a href="#" wire:click.prevent="sortBy('mobile')">

                  Mobile

                </a>
                <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="mobile" />

              </th>

              <th class="px-4 py-3">
                <a href="#" wire:click.prevent="sortBy('created_at')">

                  Created At

                </a>
                <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="created_at" />

              </th>

              <th class="px-4 py-3">
                Edit
              </th>
              <th class="px-4 py-3">
                Delete
              </th>
            </tr>
          </x-slot>

          <x-slot name="tbody">
            @forelse($users as $user)
            <tr class=" text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <td class="px-4 py-3">{{ $loop->iteration }}</td>
              <td class="px-4 py-3">
                <a href="{{ route('profile.users.getUser', ['user'=>$user]) }}">
                  <div class="flex items-center text-sm hover:text-purple-600">
                    <!-- Avatar with inset shadow -->
                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                      @if($user->image)
                      <img class="object-cover w-full h-full rounded-full" src="{{ asset('storage/avatars/'.$user->image) }}" alt="" loading="lazy" />
                      @else
                      <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                      @endif
                      <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                      <p class="font-semibold uppercase">{{ $user->full_name }}</p>
                      <p class="text-xs lowercase text-gray-600 dark:text-gray-400">
                        {{ $user->email ?? ''}}
                      </p>
                    </div>
                  </div>
                </a>
              </td>
              <td class="px-4 py-3 text-xs text-center">
                <span class="px-2 py-1  leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                  {{ ucwords($user->role->label ?? '' )}}
                </span>
              </td>
              <td class="px-4 text-center py-3 text-xs">
                {{ ucwords($user->mobile ?? '' )}}
              </td>
              <!-- <td class="px-4 py-3 text-xs">
                {{ ucwords($user->address ?? '' )}}
              </td> -->

              <td class="px-4 py-3 ml-2 text-xs">{{ $user->created_at->format('d-M-Y') }}</td>
              <td class="px-4 py-3 text-xs">

                @can('for-route', ['users.edit', $user])
                @if(!$user->isHimself(auth()->user()))
                <a href="{{ route('users.edit', $user) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-purple-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                  </svg>
                </a>
                @else
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                @endif
                @endcan
              </td>
              <td class="px-4 py-3 text-xs">
                <livewire:delete-user-component :user="$user" :key="time().'user-'.$user->id" />
              </td>

            </tr>
            @empty
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <td colspan="5" class="px-4 py-3">No results.</td>
            </tr>
            @endforelse
          </x-slot>

        </x-tables.table>

      </div>

      <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <span class="flex items-center col-span-3">
          <x-tables.entries-data :data="$users" />
        </span>
        <span class="col-span-2"></span>
        <x-tables.pagination :data="$users" />
      </div>

    </div>
  </div>
</div>