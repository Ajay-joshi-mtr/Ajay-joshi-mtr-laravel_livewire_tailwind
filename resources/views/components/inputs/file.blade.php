@props(['key'])


    <input
        {{ $attributes }}
        wire:model.defer="{{ $key }}"
        type="file"
        name="{{ $key }}"
        class="form-control @errorClass($key)"
        style="border: none"
        placeholder="{{ trans("validation.attributes.$key") }}"
    >  
    <x-inputs.error field="{{ $key }}" />
</div>
