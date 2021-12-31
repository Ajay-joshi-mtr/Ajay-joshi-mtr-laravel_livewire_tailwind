<div>
  @section('title')
  Edit Existing User
  @endsection

  @section('content-header')

  <div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
    <x-content-header>
      Edit Existing User
    </x-content-header>
    <a href="{{ route('users.index') }}" class="lg:mr-4 float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm lg:mt-10">Back</a>
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
                Full Name
              </label>
              <x-inputs.text key="user.full_name" required="required" autofocus placeholder="XXXX XXXX" />
              @error('user.full_name') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
            </div>
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Mobile
              </label>
              <x-inputs.text key="user.mobile" required="required" autofocus placeholder="+91 xxxxxxxxxx" />
              @error('user.mobile') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
            </div>
            <div class="md:w-1/2 px-3">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                Email
              </label>
              <x-inputs.email key="user.email" required="required" autofocus />
            </div>
          </div>
          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                Role
              </label>
              <x-inputs.dropdown key="user.role_id" :options="$roles" textField="name" required="required" />

              @error('user.role_id') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
            </div>
            <div class="md:w-full px-3 lg:mt-0 mt-4">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                Mobile Alt.
              </label>
              <x-inputs.text key="user.mobile_alt" autofocus placeholder="+91 xxxxxxxxxx" />
              @error('user.mobile_alt') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
            </div>

            <div class="md:w-full px-3 mt-4 lg:mt-0">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                Address
              </label>
              <x-inputs.text key="user.address" autofocus placeholder="Street address" />
              @error('user.address') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
            </div>
          </div>

          <div class="-mx-3 md:flex mb-2">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
                City
              </label>
              <x-inputs.text key="user.city" autofocus placeholder="Street address" />
              @error('user.city') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
            </div>
            <div class="md:w-1/2 px-3">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                State
              </label>
              <div class="relative">
                <x-inputs.text key="user.state" autofocus placeholder="Street address" />
                @error('user.state') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
              </div>
            </div>
            <div class="md:w-1/2 px-3 mt-4 lg:mt-0">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
                Pin Code
              </label>
              <x-inputs.text key="user.pincode" autofocus placeholder="Street address" />
              @error('user.pincode') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror
            </div>

          </div>

          <div class="-mx-3 md:flex mb-2 mt-4">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
                Password
              </label>
              <x-inputs.password key="newPassword" />
            </div>
          </div>

          <div class="-mx-3 md:flex mb-2">

            <div class="md:w-1/2 px-3">
              <x-inputs.button text="Update" />
            </div>
          </div>
        </form>
      </div>
    </x-slot>
  </x-savings.content>