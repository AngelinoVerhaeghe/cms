@if (session()->has('error'))
    <div x-data="{ open: true }" class="px-6 lg:px-8 mt-5">
        <div x-show="open" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="transform opacity-100" x-transition:leave-end="transform opacity-0"
            x-init="() => { setTimeout( () => { open = false }, 5000); }"
            class="flex justify-between bg-red-500 rounded-lg shadow py-3">
            <p class="text-sm text-red-900 font-bold px-6 lg:px-8">{{ session()->get('error') }}</p>
        </div>
    </div>
@endif
