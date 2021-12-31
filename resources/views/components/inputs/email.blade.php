@props(['key' => 'email'])

    <input
        {{ $attributes }}
        wire:model.defer="{{ $key }}"
        type="email"
        name="{{ $key }}"
        class= "block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @errorClass($key)"
        value="{{ old($key) }}"
        placeholder="user@example.com"
    >
    <x-inputs.error field="{{ $key }}" />