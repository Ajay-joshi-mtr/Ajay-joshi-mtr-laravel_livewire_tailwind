@extends('layouts.guest-app')

@section('title')
    Reset Password
@endsection

@section('content')

<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="../assets/img/login-office.jpeg"
              alt="Office"
            />
            <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              src="../assets/img/login-office-dark.jpeg"
              alt="Office"
            />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1
                class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
              >
              Reset Password
              </h1>
                <form method="POST" action="{{ route('password.email') }}">
                @csrf
                @include('layouts._flash')
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
               
                <x-inputs.email required="required" autofocus  placeholder="ajay@mp2it.com"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
              </label>

              <!-- You should use a button here, as the anchor is only used for the example  -->
              <x-inputs.button text="Send Password Reset Link" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" />
           
                    <!-- <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">{{ trans('validation.attributes.remember_me') }}</label>
                    </div> -->
           
            

              <hr class="my-8" />         

              <p class="mt-4">
                <a
                  class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                  href="{{ route('login') }}"
                >
                Sign In?
                </a>
                
              </p>
              <!-- <p class="mt-1">
                <a
                  class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                  href="./create-account.html"
                >
                  Create account
                </a>
              </p> -->
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
