<form method="POST" wire:submit.prevent="submit" x-show="show" x-transition:enter="fade">
    @csrf

    <label class="mt-4">New Email : </label>
    <x-inputs.email required="required" autofocus />

    <label class="mt-4">Current Password : </label>
    <x-inputs.password key="currentPassword"/>

    <div class="row">
        
        <div class="offset-4 col-4">
            <button type="button" class="flex-shrink-0 text-white bg-purple-500 border-0 py-2 px-3 focus:outline-none hover:bg-purple-600 rounded text-sm mt-10 sm:mt-0" style="background-color: #fa4d41;" x-on:click="show = false">Cancel</button>
            <x-inputs.button text="Save" class="btn-success" />
        </div>

    </div>
</form>
