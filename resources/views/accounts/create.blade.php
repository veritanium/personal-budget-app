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
        <x-header> Add Account </x-header>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-1/2">
            <x-form.form method="POST" action="/account">
                <x-form.section>
                    <x-form.grid>
                        <div class="col-span-full">
                            <x-form.input label="Name" name="name" required />
                        </div>
                        <div class="col-span-full">
                            <x-form.input label="Bank Name" name="bank_name" />
                        </div>
                        <div class="col-span-full">
                            <x-form.input label="Account Number (last 4)" name="account_number" type="number" maxlength="4"/>
                        </div>
                        <div class="col-span-full">
                            <x-form.select label="Account Type" name="account_type" :options="$options" required />
                        </div>
                        <div class="col-span-full">
                            <x-form.input label="Location" name="location" />
                        </div>
                    </x-form.grid>
                </x-form.section>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-app.cancel-button href="/budget">Cancel</x-app.cancel-button>
                    <x-app.primary-button type="submit">Save</x-app.primary-button>
                </div>
            </x-form.form>
        </div>
    </div>
</x-app-layout>
