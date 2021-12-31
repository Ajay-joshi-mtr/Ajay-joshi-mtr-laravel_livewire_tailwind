@props(['text'])

<button type="submit" {{ $attributes->merge(['class' => ' flex-shrink-0 text-white bg-purple-500 border-0 py-2 px-3 focus:outline-none hover:bg-purple-600 rounded text-sm mt-2']) }}>{{ $text }}</button>
