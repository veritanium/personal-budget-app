@php
    $columns = [
        [
            "header" => "Name",
            "column" => "name"
        ],
        [
            "header" => "Bank Name",
            "column" => "bank_name"
        ],
        [
            "header" => "Account Number",
            "column" => "account_number"
        ],
        [
            "header" => "Account Type",
            "column" => "account_type"
        ],
        [
            "header" => "Location",
            "column" => "location"
        ],
        [
            "header" => "",
            "column" => "edit",
            "type" => "link",
            "route" => 'account.edit',
            "default_text" => "Edit",
        ]
    ];
@endphp

<x-app-layout>
    <x-slot name="heading">
        <div class="flex justify-between">
            <x-header>Accounts</x-header>
            <x-app.primary-button :href="route('account.create')" type="link">Add Account</x-app.primary-button>
        </div>
    </x-slot>

    <x-table.table :columns="$columns" :data="$accounts" />

    {{ $accounts->links() }}
</x-app-layout>
