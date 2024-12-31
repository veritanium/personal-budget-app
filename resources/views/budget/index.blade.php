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

            <li class="rounded-md hover:bg-gray-200 hover:dark:bg-gray-800 gap-x-6 p-5">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <div class="flex justify-between">
                                <a href="/budget/{{  $budget->id }}/edit" class="flex text-sm/6 font-semibold default-text space-x-1">
                                    <span>{{ $budget->name }}</span>
                                    <div class="w-5">
                                        <x-icon.edit />
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
                            <p class="text-sm/6 default-text">{{ $budget->description }}</p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="mt-1 text-xs/5 text-gray-400">created <time datetime="{{ $budget->created_at }}">{{ \Illuminate\Support\Carbon::parse($budget->created_at)->format('d M Y') }}</time></p>
                    </div>
            </li>

        @endforeach
    </ul>
</x-app-layout>
