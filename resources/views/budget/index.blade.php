@props(['budgets'])

<x-app-layout>
    <x-slot name="heading">
        <div class="flex justify-between">
            <x-header>Budgets</x-header>
            <x-app.primary-button :href="route('budget.create')" type="link">Create</x-app.primary-button>
        </div>
    </x-slot>
    <ul role="list" class="divide-y divide-gray-300">
        @foreach($budgets as $budget)

            <li class="rounded-md hover:bg-gray-200 gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <div class="flex justify-between">
                                <a href="/budget/{{  $budget->id }}/edit" class="flex text-sm/6 font-semibold text-gray-900 space-x-1">
                                    <span>{{ $budget->name }}</span>
                                    <div class="w-5">
                                        <svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"></path>
                                        </svg>
                                    </div>
                                </a>
                                @if(Auth::user()->current_budget_id === $budget->id)
                                    <p class="text-yellow-600 font-bold text-lg">Current Budget</p>
                                @else
                                    <form method="POST" action="/profile/budget/{{  $budget->id }}">
                                        @csrf
                                        @method('PATCH')
                                        <x-app.primary-button>Set as Current</x-app.primary-button>
                                    </form>
                                @endif
                            </div>
                            <p class="text-sm/6 text-gray-900">{{ $budget->description }}</p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="mt-1 text-xs/5 text-gray-500">created <time datetime="{{ $budget->created_at }}">{{ \Illuminate\Support\Carbon::parse($budget->created_at)->format('d M Y') }}</time></p>
                    </div>
            </li>

        @endforeach
    </ul>
</x-app-layout>
