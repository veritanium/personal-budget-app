@php
    $columns = [
        [
            "header" => "Name",
            "column" => "name"
        ],
        [
            "header" => "",
            "column" => "edit",
            "type" => "link",
            "route" => 'tag.edit'
        ]
    ];
@endphp

<x-app-layout>
    <x-slot name="heading">
        <div class="flex justify-between">
            <x-header>Tags</x-header>
            <x-app.primary-button :href="route('tag.create')" type="link">Add Tag</x-app.primary-button>
        </div>
    </x-slot>

    <x-table.table :columns="$columns" :data="$tags" />

    {{ $tags->links() }}
</x-app-layout>
