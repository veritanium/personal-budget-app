<x-app-layout>
    <x-slot name="heading">
        <x-header>Create Period</x-header>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-1/2">
            <x-form.form method="POST" action="/period">
                <x-form.section>
                    <x-form.grid>
                        <div class="col-span-full">
                            <x-form.input label="Name" name="name" placeholder="January" />
                        </div>
                        <div class="col-span-full">
                            <x-form.input label="Start Date" name="start_date" type="date" />
                        </div>
                        <div class="col-span-full">
                            <x-form.input label="End Date" name="end_date" type="date" />
                        </div>
                    </x-form.grid>
                </x-form.section>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-app.cancel-button href="/period">Cancel</x-app.cancel-button>
                    <x-app.primary-button type="submit">Save</x-app.primary-button>
                </div>
            </x-form.form>
        </div>
    </div>
</x-app-layout>
