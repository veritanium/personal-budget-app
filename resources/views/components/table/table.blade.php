@props(['columns', 'data'])

<div class="flex">
    <table class="w-full border-1 border-gray-400 m-6">
        <thead>
            @foreach($columns as $column)
                @if($column['header'])
                    <tr class="border-b border-gray-400">
                        <x-table.header>{{ $column['header'] }}</x-table.header>
                    </tr>
                @endif
            @endforeach
        </thead>
        <tbody class="border-gray-400 border-t">
            <x-table.rows :data="$data" :columns="$columns"/>
        </tbody>
    </table>
</div>
