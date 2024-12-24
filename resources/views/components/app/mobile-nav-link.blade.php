@props(['active' => false, 'type' => 'link'])

@if($type === 'button')
    <button
        {{ $attributes }}
        class="{{ $active ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white ' }} block rounded-md px-3 py-2 text-base font-medium text-left w-full"
        aria-current="{{ $active ? 'page' : 'none' }}"
    >
        {{ $slot }}
    </button>
@else
<a
    {{ $attributes }}
    class="{{ $active ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white ' }} block rounded-md px-3 py-2 text-base font-medium"
    aria-current="{{ $active ? 'page' : 'none' }}"
>
    {{ $slot }}
</a>
@endif
