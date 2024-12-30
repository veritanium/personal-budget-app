@props(['data', 'columns'])

@foreach($data as $row)
    <tr class="border-0 border-gray-300 border-t">
        @foreach($columns as $column)
            @switch($column['type'] ?? 'null')
                @case('link')
                    <x-table.row>
                        <x-nav-link :href="route($column['route'], $row['id'])">Edit</x-nav-link>
                        {{ $row[$column['column']] }}
                    </x-table.row>
                    @break
                @default
                    @if(Arr::exists($column, 'model'))
                        @if(isset($row[$column['model']][$column['column']]))
                            <x-table.row>{{ $row[$column['model']][$column['column']] }}</x-table.row>
                        @else
                            <x-table.row />
                        @endif
                    @else
                        <x-table.row>{{ $row[$column['column']] }}</x-table.row>
                    @endif
            @endswitch
        @endforeach
    </tr>
@endforeach
