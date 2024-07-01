<x-app-layout>
    <x-slot name="header">
        <h2 class="capitalize font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ordenes
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    <x-primary-a href="{{ route('order.create') }}">
                        nueva orden
                    </x-primary-a>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="capitalize" action="{{ route('order.search') }}" method="post">
                        @csrf
                        <!-- patient -->
                        <div>
                            <x-input-label for="user_id" value="paciente" />
                            <select class="block mt-1 w-full" name="user_id">
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">
                                        {{ $patient->name . ' ' . $patient->lastname . ' ' . $patient->dni }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>
                        <div class="text-center mt-4">
                            <x-primary-button>
                                buscar
                            </x-primary-button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
