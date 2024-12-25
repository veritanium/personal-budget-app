@if (session()->has('success'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 3000)"
        class="mt-2 p-6 bg-green-200 rounded-md text-green-700 text-center"
        x-transition:enter="transition ease-out duration-400"
        x-transition:enter-start="opacity-0 scale-50"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-50"
    >
        <span>{{ session('success') }}</span>
    </div>
@endif
