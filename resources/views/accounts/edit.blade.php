@php
    $options = [
        [
            "label" => "Checking",
            "value" => "checking",
        ],
        [
            "label" => "Savings",
            "value" => "savings",
        ],
        [
            "label" => "Cash",
            "value" => "cash",
        ],
    ];
@endphp

<x-app-layout>
    <x-slot name="heading">
        <x-header>Edit Account</x-header>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-1/2">
            <form method="POST" action="/account/{{ $account->id }}">
                @csrf
                @method('PATCH')
                <x-form.section>
                    <x-form.grid>
                        <div class="col-span-full">
                            <x-form.input label="Name" name="name" required value="{{ $account->name }}" />
                        </div>
                        <div class="col-span-full">
                            <x-form.input label="Bank Name" name="bank_name" value="{{ $account->bank_name }}" />
                        </div>
                        <div class="col-span-full">
                            <x-form.input label="Account Number (last 4)" name="account_number" type="number" maxlength="4" value="{{ $account->account_number }}"/>
                        </div>
                        <div class="col-span-full">
                            <x-form.select label="Account Type" name="account_type" :options="$options" required  value="{{ $account->account_type }}"/>
                        </div>
                        <div class="col-span-full">
                            <x-form.input label="Location" name="location" value="{{ $account->location }}" />
                        </div>
                    </x-form.grid>
                </x-form.section>

                <div class="mt-6 flex items-center justify-between gap-x-6">
                    <x-app.danger-button form="delete-account">Delete</x-app.danger-button>
                    <div class="flex items-center gap-x-6">
                        <x-app.cancel-button href="/account">Cancel</x-app.cancel-button>
                        <x-app.primary-button type="submit">Update</x-app.primary-button>
                    </div>
                </div>
            </form>
            <form method="POST" action="/account/{{ $account->id }}" id="delete-account" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</x-app-layout>
