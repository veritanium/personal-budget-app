<x-app-layout>
    <x-slot name="heading">
        <x-header> Create Tag </x-header>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-1/2">
            <x-form.form method="POST" action="/tag">
                <x-form.section>
                    <x-form.grid>
                        <div class="col-span-full">
                            <x-form.input label="Name" name="name" required />
                        </div>
                    </x-form.grid>
                </x-form.section>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-app.cancel-button href="/tag">Cancel</x-app.cancel-button>
                    <x-app.primary-button type="submit">Save</x-app.primary-button>
                </div>
            </x-form.form>
        </div>
    </div>
</x-app-layout>
