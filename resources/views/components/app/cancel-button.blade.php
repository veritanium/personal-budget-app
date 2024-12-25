@if($attributes->has('href'))
    <a {{ $attributes }} class="text-sm/6 font-semibold text-gray-900">{{ $slot }}</a>
@else
    <button {{ $attributes }} class="text-sm/6 font-semibold text-gray-900">{{ $slot }}</button>
@endif
