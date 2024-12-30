@props(['data', 'columns'])

@foreach($data as $row)
    <tr class="border-0 border-gray-300 border-t">
        @foreach($columns as $column)
            @php
            $columnData = '';

            switch (true) {
                case(Arr::exists($column, 'model')):
                    $columnData = isset($row[$column['model']][$column['column']]) ? $row[$column['model']][$column['column']] : '';
                    break;
                case(Arr::exists($column, 'model_method')):
                    $columnData = $row->{$column['model_method']}();
                    break;
                default:
                    $columnData = $row[$column['column']];
            }
            @endphp

            @switch($column['type'] ?? 'null')
                @case('link')
                    <x-table.row>
                        <x-nav-link :href="route($column['route'], $row['id'])">Edit</x-nav-link>
                        {{ $columnData }}
                    </x-table.row>
                    @break
                @default
                    @if (Arr::exists($column, 'row_style_method'))
                        <x-table.row :class="$row->{$column['row_style_method']}()">{{ $columnData }}</x-table.row>
                    @else
                    <x-table.row>{{ $columnData }}</x-table.row>
                    @endif
            @endswitch
        @endforeach
    </tr>
@endforeach
