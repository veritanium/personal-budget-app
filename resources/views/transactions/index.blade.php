@php
    $columns = [
        [
            "header" => "Title",
            "column" => "title"
        ],
        [
            "header" => "Account",
            "model" => "account",
            "column" => "name",
        ],
        [
            "header" => "Category",
            "model" => "category",
            "column" => "name"
        ],
        [
            "header" => "Entity",
            "model" => "entity",
            "column" => "name"
        ],
        [
            "header" => "Amount",
            "column" => "amount"
        ],
        [
            "header" => "",
            "column" => "edit",
            "type" => "link",
            "route" => 'transaction.edit'
        ]
    ];
@endphp

<x-app-layout>
    <x-slot name="heading">
        <div class="flex justify-between">
            <x-header>Ledger</x-header>
            <x-app.primary-button :href="route('transaction.create')" type="link">Add Transaction</x-app.primary-button>
        </div>
    </x-slot>

    <x-table.table :columns="$columns" :data="$transactions" />

    {{ $transactions->links() }}
</x-app-layout>
