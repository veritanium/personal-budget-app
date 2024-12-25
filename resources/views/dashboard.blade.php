
<x-app-layout>
    <x-slot name="heading">
        <div class="flex justify-between">
            <x-header>Dashboard</x-header>
            @if(Gate::allows('access-budget', Auth::user()))
                <h2 class="flex-1 text-2xl font-bold tracking-tight text-gray-900 text-center">{{ Auth::user()->currentBudget->name }}</h2>
            @endif
        </div>
    </x-slot>

    <div class="py-12">

    </div>
</x-app-layout>
