@props(['columns', 'data'])

<div class="flex">
    <table class="w-full border-1 border-gray-400 m-6">
        <thead>
            <tr class="border-b border-gray-400">
                @foreach($columns as $column)
                    @if($column['header'])
                            <x-table.header>{{ $column['header'] }}</x-table.header>
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody class="border-gray-400 border-t">
            <x-table.rows :data="$data" :columns="$columns"/>
        </tbody>
    </table>
</div>
