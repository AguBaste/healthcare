<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($providers as $provider)
                        <div class="m-6 flex items-center justify-between ">
                            <p class="capitalize font-bold">{{ $provider->name . ' ' . $provider->lastname }}</p>
                            <p class="capitalize ">{{$provider->specialty}}</p>
                            <a class="bg-teal-500 p-2 rounded text-white uppercase" href="{{ route('provider.show', $provider) }}">ver info</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
