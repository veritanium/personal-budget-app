@php
    $columns = [
        [
            "header" => "Name",
            "column" => "name",
            "type" => "link",
            "route" => 'period.show'
        ],
        [
            "header" => "Start Date",
            "column" => "start_date",
            "model_method" => "getFormattedStartDate",
        ],
        [
            "header" => "End Date",
            "column" => "end_date",
            "model_method" => "getFormattedEndDate",
        ],
        [
            "header" => "",
            "column" => "edit",
            "default_text" => "Edit",
            "type" => "link",
            "route" => 'period.edit'
        ]
    ];
@endphp

<x-app-layout>
    <x-slot name="heading">
        <div class="flex justify-between">
            <x-header>Periods</x-header>
            <x-app.primary-button :href="route('period.create')" type="link">Create Period</x-app.primary-button>
        </div>
    </x-slot>

    <x-table.table :columns="$columns" :data="$periods" />

    {{ $periods->links() }}
</x-app-layout>
