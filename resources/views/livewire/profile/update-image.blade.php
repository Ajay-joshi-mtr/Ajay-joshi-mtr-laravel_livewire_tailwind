<form method="POST" wire:submit.prevent="submit" x-show="show" x-transition:enter="fade">
    @csrf
    <div>

        <label> <b>Profile Image : </b> </label><br>
        <x-inputs.file key="image" required="required" />
      	@error('image') <p class="text-red-600 text-xs italic">{{ $message }} </p> @enderror

        <div class="row mt-0">
            <div class="offset-4 col-4">
                <button type="button" class="flex-shrink-0 text-white bg-red-500 border-0 py-2 px-3 focus:outline-none hover:bg-red-600 rounded text-sm" x-on:click="show = false">Cancel</button>
                <x-inputs.button text="Save" class="btn-success" />
            </div>
        </div>

    </div>
</form>