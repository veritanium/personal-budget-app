@php
    $type_options = [
        [
            "label" => "Debit",
            "value" => "debit",
        ],
        [
            "label" => "Credit",
            "value" => "credit",
        ],
    ];
@endphp

<x-app-layout>
    <x-slot name="heading">
        <x-header>Edit Transaction</x-header>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-1/2">
            <form method="POST" action="/transaction/{{ $transaction->id }}">
                @csrf
                @method('PATCH')
                <x-form.section>
                    <x-form.grid>
                        <div class="col-span-full">
                            <x-form.input label="Title" name="title" required value="{{ $transaction->title }}" />
                        </div>
                        <div class="col-span-full">
                            <x-form.select label="Account" name="account_id" :options="$accounts" :nullable="false" required value="{{ $transaction->account_id }}" />
                        </div>
                        <div class="col-span-full">
                            <x-form.select label="Category" name="category_id" :options="$categories" value="{{ $transaction->category_id }}" />
                        </div>
                        <div class="col-span-full">
                            <x-form.select label="Entity" name="entity_id" :options="$entities" value="{{ $transaction->entity_id }}" />
                        </div>
                        <div class="col-span-full">
                            <x-form.select label="Transaction Type" name="type" :options="$type_options" :nullable="false" required value="{{ $transaction->type }}" />
                        </div>
                        <div class="col-span-full">
                            <x-form.input label="Amount" name="amount" x-mask:dynamic="$money($input)" placeholder="0.00" required value="{{ $transaction->amountCentsToDollars() }}" />
                        </div>
                        <div class="col-span-full">
                            <x-form.input label="Notes" name="notes" type="textarea" rows="1" value="{{ $transaction->notes }}" />
                        </div>
                    </x-form.grid>
                </x-form.section>

                <div class="mt-6 flex items-center justify-between gap-x-6">
                    <x-app.danger-button form="delete-transaction">Delete</x-app.danger-button>
                    <div class="flex items-center gap-x-6">
                        <x-app.cancel-button href="/transaction">Cancel</x-app.cancel-button>
                        <x-app.primary-button type="submit">Update</x-app.primary-button>
                    </div>
                </div>
            </form>
            <form method="POST" action="/transaction/{{ $transaction->id }}" id="delete-transaction" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</x-app-layout>
