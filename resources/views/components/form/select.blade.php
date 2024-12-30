@props(['label', 'name', 'options', 'nullable' => true])
@php
    $oldValue = old($name);

    //format model
    $list_options = [];
    if (count($options) && $options[0] instanceof \Illuminate\Database\Eloquent\Model) {
        foreach ($options as $option) {
            $option_array = $option->attributesToArray();
            $new_option = [];
            if(Arr::exists($option_array, 'id')) {
                $new_option['value'] = $option_array['id'];
            }
            if(Arr::exists($option_array, 'name')) {
                $new_option['label'] = $option_array['name'];
            }
            array_push($list_options, $new_option);
        }
    } else {
        $list_options = $options;
    }

@endphp

<div>
    <label for="{{ $name }}" class="block text-sm/6 font-medium text-gray-900">{{ $label }}</label>
    <div class="mt-2 grid grid-cols-1">
        <select id="{{ $name }}" name="{{ $name }}" autocomplete="{{ $name }}-name" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            @if($nullable)
                <option></option>
            @endif

            @foreach($list_options as $option)
                <option
                    value="{{ $option['value'] }}"
                    {{  $oldValue === $option['value'] || $attributes->get('value') === $option['value'] ? 'selected' : '' }}
                >{{ $option['label'] }}</option>
            @endforeach
        </select>
        <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
        </svg>
    </div>
    <x-form.error :error="$errors->first($name)" />
</div>
