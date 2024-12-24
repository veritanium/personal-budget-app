@props(['budgets'])

<x-app-layout>
    <x-slot name="heading">
        Budgets
    </x-slot>
    <div>
        @foreach($budgets as $budget)
            <div>
                <a href="#">{{ $budget->name }}</a>
            </div>
        @endforeach
    </div>
</x-app-layout>
