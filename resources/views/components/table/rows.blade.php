@props(['data', 'columns'])

@foreach($data as $row)
    <tr class="border-0 border-gray-300 border-t">
        @foreach($columns as $column)
            @switch($column['type'] ?? 'null')
                @case('link')
                    <x-table.row>
                        <x-nav-link :href="route($column['route'], $row['id'])">Edit</x-nav-link>
                        {{ $row->getAttribute($column['column']) }}
                    </x-table.row>
                    @break
                @default
                    <x-table.row>{{ $row->getAttribute($column['column']) }}</x-table.row>
            @endswitch
        @endforeach
    </tr>
@endforeach
