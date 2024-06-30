<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            panel
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($providers as $provider)
                        <div class="m-6 flex items-center justify-between ">
                            <p>{{ $provider->name . ' ' . $provider->lastname }}</p>
                            <p>{{$provider->specialty}}</p>
                            <a class="bg-teal-500 p-2 rounded text-white" href="{{ route('provider.show', $provider) }}">ver info</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
