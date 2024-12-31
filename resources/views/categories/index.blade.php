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
        "route" => 'category.edit',
        "default_text" => "Edit",
    ]
];
@endphp

<x-app-layout>
    <x-slot name="heading">
        <div class="flex justify-between">
            <x-header>Categories</x-header>
            <x-app.primary-button :href="route('category.create')" type="link">Add Category</x-app.primary-button>
        </div>
    </x-slot>

    <x-table.table :columns="$columns" :data="$categories" />

    {{ $categories->links() }}
</x-app-layout>
