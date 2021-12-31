@extends('layouts.app')

@section('title')
Profile
@endsection


@section('content-header')
<div class=" flex flex-col sm:flex-row sm:items-center items-start mx-auto">
    <x-content-header>
        User Details
    </x-content-header>
    @if($user->id!=auth()->user()->id)
    @can('for-route', ['users.edit', $user])
    <a href="{{ route('users.edit', $user) }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm mt-2 lg:mt-8 mr-4">Edit</a>
    @endcan
    @endif
    @can('for-route', ['users.index'])
    <a href="{{ route('users.index') }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm mt-2 lg:mt-8">Back</a>
    @endcan
</div>
@endsection



@section('content')

<div class="container-fluid mt-4">
    <div class="row">

        <div class="offset-lg-4 col-lg-5 col-md-6 offset-md-5">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">


                <!-- mobile profile view -->

                <div class="bg-white dark:bg-gray-800 w-full lg:hidden justify-center items-center overflow-hidden md:max-w-sm rounded-lg shadow-sm mx-auto">
                    <div class="relative h-40">
                        <img class="absolute h-full w-full object-cover" src="https://images.unsplash.com/photo-1448932133140-b4045783ed9e?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80">
                    </div>
                    <div class="relative shadow mx-auto h-24 w-24 -my-12 border-white rounded-full overflow-hidden border-4">
                        @if ($user->image)
                        <img class="w-96 h-96 rounded-full" src="{{ asset('storage/avatars/'.$user->image) }}" />
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-21 h-21" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        @endif
                        <!-- <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=80"> -->
                    </div>
                    <div class="mt-16">
                        <h1 class="text-lg text-center font-semibold">
                            {{ $user->full_name }}
                        </h1>
                        <p class="text-sm bg:text-gray-400 text-gray-800 text-center">
                            ( {{ $user->role->name }} )
                        </p>
                    </div>
                    <!-- <div class="mt-6 pt-3 flex flex-wrap mx-6 border-t">
                        <div class="text-xs mr-2 my-1 uppercase tracking-wider border px-2 text-indigo-600 border-indigo-600 hover:bg-indigo-600 hover:text-indigo-100 cursor-default">
                            User experience
                        </div>
                        <div class="text-xs mr-2 my-1 uppercase tracking-wider border px-2 text-indigo-600 border-indigo-600 hover:bg-indigo-600 hover:text-indigo-100 cursor-default">
                            VueJS
                        </div>
                        <div class="text-xs mr-2 my-1 uppercase tracking-wider border px-2 text-indigo-600 border-indigo-600 hover:bg-indigo-600 hover:text-indigo-100 cursor-default">
                            TailwindCSS
                        </div>
                        <div class="text-xs mr-2 my-1 uppercase tracking-wider border px-2 text-indigo-600 border-indigo-600 hover:bg-indigo-600 hover:text-indigo-100 cursor-default">
                            React
                        </div>
                        <div class="text-xs mr-2 my-1 uppercase tracking-wider border px-2 text-indigo-600 border-indigo-600 hover:bg-indigo-600 hover:text-indigo-100 cursor-default">
                            Painting
                        </div>
                    </div> -->
                </div>






                <div class="card card-outline">
                    <div class="card-body box-profile">

                        <div class="hidden lg:grid grid-flow-col grid-cols-1 grid-rows-3 lg:grid-flow-row lg:grid-cols-7 lg:grid-rows-1 tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <div style="text-align: -webkit-center;">
                                @if ($user->image)
                                <img class="w-96 h-96 rounded-full" src="{{ asset('storage/avatars/'.$user->image) }}" />
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                @endif
                            </div>

                            <div class="-mb-20 lg:pt-10 lg:col-span-6 text-center lg:text-left pt-4">
                                <strong> {{ $user->full_name }}</strong> <span class="hidden lg:inline"> ({{ $user->role->name }}) </span>
                            </div>
                            <div class="h-0 lg:pt-10 text-center lg:hidden lg:text-left">
                                ({{ $user->role->name }})
                            </div>
                        </div>


                        <div class="" style="margin:2em 0em;"></div>

                        <ul class="list-group list-group-unbordered mb-3">
                            <!-- <x-profile.element :user="$user">
                                <x-slot name="element">
                                    <div class="col-md-12">
                                        <b>Email : </b>
                                    </div>
                                    <div class="col-8 col-md-8">
                                        {{ $user->email }}
                                    </div>
                                </x-slot>

                                <x-slot name="livewire">
                                    <livewire:profile.update-email />
                                </x-slot>
                            </x-profile.element> -->

                            <div class="" style="margin-bottom: 1.8em;">
                                <div class="col-md-12 inline-block lg:w-1/5">
                                    <b> Email </b>
                                </div>

                                <div class="col-8 col-md-8 inline-block">
                                    {{ $user->email }}
                                </div>
                                <div class="inline-block px-2" style="opacity: 0.5;">
                                    @if($user->id===auth()->user()->id)
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    @endif
                                </div>
                            </div>

                            <x-profile.element :user="$user">
                                <x-slot name="element">
                                    <div class="col-md-12 inline-block lg:w-1/5">
                                        <b> Name </b>
                                    </div>

                                    <div class="col-8 col-md-8 inline-block">
                                        {{ $user->full_name }}
                                    </div>
                                </x-slot>
                                <x-slot name="livewire">
                                    <livewire:profile.update-name />
                                </x-slot>
                            </x-profile.element>

                            <x-profile.element :user="$user">
                                <x-slot name="element">
                                    <div class="col-md-12 inline-block lg:w-1/5">
                                        <b> Mobile </b>
                                    </div>

                                    <div class="col-8 col-md-8 inline-block">
                                        {{ $user->mobile }}
                                    </div>
                                </x-slot>
                                <x-slot name="livewire">
                                    @if($user->id===auth()->user()->id)
                                    <livewire:profile.update-mobile />
                                    @endif
                                </x-slot>
                            </x-profile.element>

                            <x-profile.element :user="$user">
                                <x-slot name="element">
                                    <div class="col-md-12 inline-block lg:w-1/5">
                                        <b> Alt Mobile </b>
                                    </div>

                                    <div class="col-8 col-md-8 inline-block">
                                        {{ $user->mobile_alt }}
                                    </div>
                                </x-slot>
                                <x-slot name="livewire">
                                    <livewire:profile.update-mobilealt />
                                </x-slot>
                            </x-profile.element>


                            <x-profile.element :user="$user">
                                <x-slot name="element">
                                    <div class="col-md-12 inline-block lg:w-1/5">
                                        <b> Pincode </b>
                                    </div>

                                    <div class="col-8 col-md-8 inline-block">
                                        {{ $user->pincode }}
                                    </div>
                                </x-slot>
                                <x-slot name="livewire">
                                    <livewire:profile.update-pincode />
                                </x-slot>
                            </x-profile.element>

                            <x-profile.element :user="$user">
                                <x-slot name="element">
                                    <div class="col-md-12 inline-block lg:w-1/5">
                                        <b> City </b>
                                    </div>

                                    <div class="col-8 col-md-8 inline-block">
                                        {{ $user->city }}
                                    </div>
                                </x-slot>
                                <x-slot name="livewire">
                                    <livewire:profile.update-city />
                                </x-slot>
                            </x-profile.element>

                            <x-profile.element :user="$user">
                                <x-slot name="element">
                                    <div class="col-md-12 inline-block lg:w-1/5">
                                        <b> State </b>
                                    </div>

                                    <div class="col-8 col-md-8 inline-block">
                                        {{ $user->state }}
                                    </div>
                                </x-slot>
                                <x-slot name="livewire">
                                    <livewire:profile.update-state />
                                </x-slot>
                            </x-profile.element>

                            <x-profile.element :user="$user">
                                <x-slot name="element">
                                    <div class="col-md-12 inline-block lg:w-1/5">
                                        <b> Address </b>
                                    </div>

                                    <div class="col-8 col-md-8 inline-block">
                                        {{ $user->address }}
                                    </div>
                                </x-slot>
                                <x-slot name="livewire">
                                    <livewire:profile.update-address />
                                </x-slot>
                            </x-profile.element>

                            <x-profile.element :user="$user">
                                <x-slot name="element">
                                    <div class="col-md-12 inline-block lg:w-1/5">
                                        <b> Password </b>
                                    </div>

                                    <div class="col-8 col-md-8 inline-block">
                                        ***************
                                    </div>
                                </x-slot>
                                <x-slot name="livewire">
                                    <livewire:profile.update-password />
                                </x-slot>
                            </x-profile.element>



                            <x-profile.element :user="$user">
                                <x-slot name="element">
                                    <div class="col-md-12 inline-block lg:w-1/5">
                                        <b> Profile Image </b>
                                    </div>

                                    <div class="col-8 col-md-8 inline-block">
                                        Profile Picture
                                    </div>
                                </x-slot>
                                <x-slot name="livewire">
                                    <livewire:profile.update-image />
                                </x-slot>
                            </x-profile.element>

                        </ul>

                        <!-- ul -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection