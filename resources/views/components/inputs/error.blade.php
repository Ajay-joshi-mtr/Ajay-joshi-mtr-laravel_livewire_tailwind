@props(['field'])

@error($field)    
    <p class="text-red-600 text-xs italic">{{ $message }} </p>
@enderror