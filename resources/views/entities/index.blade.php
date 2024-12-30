@php
    $columns = [
        [
            "header" => "Name",
            "column" => "name"
        ],
        [
            "header" => "Description",
            "column" => "description"
        ],
        [
            "header" => "",
            "column" => "edit",
            "type" => "link",
            "route" => 'entity.edit'
        ]
    ];
@endphp

<x-app-layout>
    <x-slot name="heading">
        <div class="flex justify-between">
            <x-header>Entities</x-header>
            <x-app.primary-button :href="route('entity.create')" type="link">Add Entity</x-app.primary-button>
        </div>
    </x-slot>

    <x-table.table :columns="$columns" :data="$entities" />

    {{ $entities->links() }}
</x-app-layout>
