@props(['key' => 'password', 'showHidePasswordIcon' => false])

<div class="input-group mb-3" x-data="{ showPassword: false }">
    <input
        x-ref="{{ $key }}"
        wire:model.defer="{{ $key }}"
        type="password"
        name="{{ $key }}"
        
        placeholder="********"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
    >

    <x-inputs.fa fontAwesome="fa-lock" />

    @if ($showHidePasswordIcon)
        <div
            x-on:click="
                showPassword = !showPassword;
                if (showPassword) {
                    $refs.{{ $key }}.type = 'text';
                    $refs.icon.classList.add('fa-eye-slash');
                    $refs.icon.classList.remove('fa-eye');
                }
                else {
                    $refs.{{ $key }}.type = 'password';
                    $refs.icon.classList.add('fa-eye');
                    $refs.icon.classList.remove('fa-eye-slash');
                }
            "
            class="input-group-append"
        >
            <div class="input-group-text">
                <span x-ref="icon" class="fas fa-eye"></span>
            </div>
        </div>
    @endif

    <x-inputs.error field="{{ $key }}" />
</div>
