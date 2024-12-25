@props(['label', 'name'])

<div>
    @if ($label)
        <x-form.label :$name :$label />
    @endif

    <div class="mt-2">
        {{ $slot }}

        <x-form.error :error="$errors->first($name)" />
    </div>
</div>
