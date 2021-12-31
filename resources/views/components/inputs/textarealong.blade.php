@props(['key'])
    <textarea
        {{ $attributes }}
        wire:model.defer="{{ $key }}"
        type="textarea"
        name="{{ $key }}"
        class="block h-40 w-full mt-1 text-sm resize-y dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @errorClass($key)"
        placeholder="{{ trans('validation.attributes.$key') }}"
        value="{{ old($key) }}"
    ></textarea>