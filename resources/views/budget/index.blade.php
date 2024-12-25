@props(['budgets'])

<x-app-layout>
    <x-slot name="heading">
        <div class="flex justify-between">
            <x-header>Budgets</x-header>
            <x-app.primary-button :href="route('budget.create')" type="link">Create</x-app.primary-button>
        </div>
    </x-slot>
    <div>
        @foreach($budgets as $budget)
            <div>
                <a href="/budget/{{  $budget->id }}">{{ $budget->name }}</a>
            </div>
        @endforeach
    </div>
</x-app-layout>
