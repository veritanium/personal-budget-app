<x-app-layout>
    <x-slot name="heading">
        <x-header>Edit Period</x-header>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-1/2">
            <form method="POST" action="/period/{{ $period->id }}">
                @csrf
                @method('PATCH')
                <x-form.section>
                    <x-form.grid>
                        <div class="col-span-full">
                            <x-form.input label="Name" name="name" value="{{ $period->name }}" />
                        </div>
                        <div class="col-span-full">
                            <x-form.input label="Start Date" name="start_date" type="date" value="{{ \Carbon\Carbon::parse($period->start_date)->format('Y-m-d') }}" />
                        </div>
                        <div class="col-span-full">
                            <x-form.input label="End Date" name="end_date" type="date" value="{{ \Carbon\Carbon::parse($period->end_date)->format('Y-m-d') }}" />
                        </div>
                    </x-form.grid>
                </x-form.section>

                <div class="mt-6 flex items-center justify-between gap-x-6">
                    <x-app.danger-button form="delete-period">Delete</x-app.danger-button>
                    <div class="flex items-center gap-x-6">
                        <x-app.cancel-button href="/period">Cancel</x-app.cancel-button>
                        <x-app.primary-button type="submit">Update</x-app.primary-button>
                    </div>
                </div>
            </form>
            <form method="POST" action="/period/{{ $period->id }}" id="delete-period" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</x-app-layout>
