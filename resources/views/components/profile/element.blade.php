@props(['user', 'livewire'])

<li class="list-group-item mb-6" x-data="{ show: false}" @close.window="show = false" x-cloak>
    <div class="row" x-show="!show" x-transition:enter="fade">
        {{ $element }}

        @if($user->id===auth()->user()->id)
        <div class="col-4 col-md-4 inline-block">
            <a href="#" class="float-right flex-shrink-0 text-purple-500 border-0 py-1 px-2 focus:outline-none hover:text-purple-600 rounded text-sm mt-0" x-on:click="show = true" style="margin-bottom: -0.5em;"> 
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
        @endif
    </div>

    {{ $livewire }}

</li>