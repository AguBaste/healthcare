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
                    <div class="m-6 text-center">
                        <h1><strong class="text-xl">{{$provider->user->name . ' ' . $provider->user->lastname}}</strong> {{$provider->specialty->description }}</h1>
                    </div>
                    <div class="w-auto">
                        <table class="table-auto w-full text-center">
                            <thead>
                                <tr>
                                    <th class="text-lg">dia</th>
                                    <th class="text-lg">desde</th>
                                    <th class="text-lg">hasta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedule as $item)
                                    <tr>
                                        <td>{{ $item->day }}</td>
                                        <td>{{ $item->start }}</td>
                                        <td>{{ $item->end }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
