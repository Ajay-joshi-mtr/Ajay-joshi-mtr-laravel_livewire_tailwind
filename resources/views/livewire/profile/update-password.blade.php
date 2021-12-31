<form method="POST" wire:submit.prevent="submit" x-show="show" x-transition:enter="fade">
    @csrf

    <label class="mt-4"> Current Password : </label>
    <x-inputs.password key="currentPassword" />

    <label class="mt-4"> New Password : </label>
    <x-inputs.password key="newPassword" autofocus />

    <label class="mt-4"> Confirm New Password : </label>
    <x-inputs.password key="newPasswordConfirmation" />

    <div class="row -mt-2">
        <div class="offset-4 col-4">
            <button type="button" class="flex-shrink-0 text-white bg-red-500 border-0 py-2 px-3 focus:outline-none hover:bg-red-600 rounded text-sm" x-on:click="show = false">Cancel</button>
            <x-inputs.button text="Save" class="btn-success" />
        </div>
    </div>
</form>