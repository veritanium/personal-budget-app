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
        <x-header> Add Transaction </x-header>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-1/2">
            <x-form.form method="POST" action="/transaction">
                <x-form.section>
                    <x-form.grid>
                        <div class="col-span-full">
                            <x-form.input label="Title" name="title" required />
                        </div>
                        <div class="col-span-full">
                            <x-form.select label="Account" name="account_id" :options="$accounts" :nullable="false" required />
                        </div>
                        <div class="col-span-full">
                            <x-form.select label="Category" name="category_id" :options="$categories" />
                        </div>
                        <div class="col-span-full">
                            <x-form.select label="Entity" name="entity_id" :options="$entities" />
                        </div>
                        <div class="col-span-full">
                            <x-form.input label="Amount" name="amount" type="number" required />
                        </div>
                        <div class="col-span-full">
                            <x-form.input label="Notes" name="notes" type="textarea" rows="1" />
                        </div>
                    </x-form.grid>
                </x-form.section>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-app.cancel-button href="/transaction">Cancel</x-app.cancel-button>
                    <x-app.primary-button type="submit">Save</x-app.primary-button>
                </div>
            </x-form.form>
        </div>
    </div>
</x-app-layout>
