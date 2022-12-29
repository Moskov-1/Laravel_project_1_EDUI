<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class='mr-5 p-2 hover:bg-[#fec] hover:text-[blue]' href="/">{{ __('Home') }}</a>
            <a class='mr-5  p-2 hover:bg-[#000] hover:text-[blue]' href="/">{{ __('Dashboard') }}</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("why are u here") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
