<x-app-layout>
    <x-slot name="heading">
        <x-header> Create Entity </x-header>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-1/2">
            <x-form.form method="POST" action="/entity">
                <x-form.section>
                    <x-form.grid>
                        <div class="col-span-full">
                            <x-form.input label="Name" name="name" required />
                        </div>

                        <div class="col-span-full">
                            <x-form.input label="Description" name="description" type="textarea" rows="3" />
                        </div>
                    </x-form.grid>
                </x-form.section>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-app.cancel-button href="/entity">Cancel</x-app.cancel-button>
                    <x-app.primary-button type="submit">Save</x-app.primary-button>
                </div>
            </x-form.form>
        </div>
    </div>
</x-app-layout>
