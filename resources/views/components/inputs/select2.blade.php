@props(['options', 'key', 'textField'])
    <select
        {{ $attributes }}
        wire:model.defer="{{ $key }}"
        name="{{ $key }}"
        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray @errorClass($key)"
        placeholder="--Select Role--"
    >
        <option style="opacity: 0;">-- Select --</option>
        @foreach($options as $option)
            <option value="{{ $option->id }}">{{ ucwords($option->$textField ?? '' ) }}</option>
        @endforeach
    </select> 