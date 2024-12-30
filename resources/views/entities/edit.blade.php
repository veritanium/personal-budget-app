<x-app-layout>
    <x-slot name="heading">
        <x-header> Edit Entity </x-header>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-1/2">
            <form method="POST" action="/entity/{{ $entity->id }}">
                @csrf
                @method('PATCH')
                <x-form.section>
                    <x-form.grid>
                        <div class="col-span-full">
                            <x-form.input label="Name" name="name" value="{{ $entity->name }}" />
                        </div>

                        <div class="col-span-full">
                            <x-form.input label="Description" name="description" type="textarea" rows="3">{{ $entity->description }}</x-form.input>
                        </div>
                    </x-form.grid>
                </x-form.section>

                <div class="mt-6 flex items-center justify-between gap-x-6">
                    <x-app.danger-button form="delete-entity">Delete</x-app.danger-button>
                    <div class="flex items-center gap-x-6">
                        <x-app.cancel-button href="/entity">Cancel</x-app.cancel-button>
                        <x-app.primary-button type="submit">Update</x-app.primary-button>
                    </div>
                </div>
            </form>
            <form method="POST" action="/entity/{{ $entity->id }}" id="delete-entity" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</x-app-layout>
