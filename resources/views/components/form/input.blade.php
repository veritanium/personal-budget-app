@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6',
        'value' => old($name)
    ];
@endphp

<x-form.field :$label :$name>
    @if($attributes->get('type') === 'textarea')
        <textarea {{ $attributes($defaults) }}>{{ $slot }}</textarea>
    @else
        <input {{ $attributes($defaults) }}>
    @endif
</x-form.field>
