<x-app-layout>
    <x-slot name="heading">
        <x-header> Edit Tag </x-header>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-1/2">
            <form method="POST" action="/tag/{{ $tag->id }}">
                @csrf
                @method('PATCH')
                <x-form.section>
                    <x-form.grid>
                        <div class="col-span-full">
                            <x-form.input label="Name" name="name" value="{{ $tag->name }}" />
                        </div>
                    </x-form.grid>
                </x-form.section>

                <div class="mt-6 flex items-center justify-between gap-x-6">
                    <x-app.danger-button form="delete-tag">Delete</x-app.danger-button>
                    <div class="flex items-center gap-x-6">
                        <x-app.cancel-button href="/tag">Cancel</x-app.cancel-button>
                        <x-app.primary-button type="submit">Update</x-app.primary-button>
                    </div>
                </div>
            </form>
            <form method="POST" action="/tag/{{ $tag->id }}" id="delete-tag" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</x-app-layout>
