@if (session('status'))
    
    <div class="bg-teal-100 border-t-4 border-purple-500 rounded-b text-purple-900 px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
    <div>
      <p class="font-bold"> {{ session('status') }}</p>
      <p class="text-sm"> {{ session('status') }}</p>
    </div>
  </div>
</div>
@endif

@if (session('flash'))
    
    <div class="dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800 border-t-4 border-purple-500 rounded-b text-purple-900 px-4 py-3 shadow-md alert alert-{{ session('flash')['level'] }}" role="alert" x-data="{show : true}" x-show="show" x-init="setTimeout(() => { show = false; }, 3500);">
       
  <div class="flex items-center">
    <div class="py-1"><svg class="fill-current h-6 w-6 text-purple-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
    <div>
      <p >   {{ session('flash')['message'] }}</p>     
    </div>
  </div>
</div>
@endif

<div
    x-data="{show : false}"
    x-cloak
    @flash.window="
        show = true;
        $el.innerHTML = $event.detail.message;
        $el.classList.add($event.detail.level);        
        setTimeout(() => { show = false; }, 3500);
    "
    class="dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800 border-t-4 border-purple-500 rounded-b text-purple-900 px-4 py-3 shadow-md alert "
    role="alert"
    x-show="show"
>
</div>
