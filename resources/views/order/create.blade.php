<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  text-gray-900 dark:text-gray-100">
                    <form class="capitalize" action="{{ route('order.store') }}" method="post">
                        @csrf
                        <!-- patient -->
                        @if ($patients != null)
                            <div>
                                <x-input-label for="user_id" value="paciente" />
                                <select class="capitalize block mt-1 w-full" name="user_id" id="">
                                    @foreach ($patients as $patient)
                                        <option value="{{$patient->id}}">{{ $patient->lastname .' '.$patient->name}}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('user_id')" class="mt-2"/>
                            </div>
                        @else
                            <div>
                                <x-input-label for="user_id" value="paciente" />
                                <x-text-input class="block mt-1 w-full" type="text" readonly
                                    value="{{ $patient->lastname }}" />
                                <input type="hidden" name="user_id" value="{{ $patient->id }}" />
                            </div>
                        @endif


                        <!-- date -->
                        <div class="mt-4">
                            <x-input-label for="date" value="fecha" />
                            <x-text-input class="block mt-1 w-full" type="date" name="date" required />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>
                        <!-- study -->
                        <div class="mt-4">
                            <x-input-label for="study" value="estudio" />
                            <x-text-input class="block mt-1 w-full" type="text" name="study" required />
                            <x-input-error :messages="$errors->get('study')" class="mt-2" />
                        </div>
                        <!-- diagnostic -->
                        <div class="mt-4">
                            <x-input-label for="diagnostic" value="diagnostico" />
                            <x-text-input class="block mt-1 w-full" type="text" name="diagnostic" required />
                            <x-input-error :messages="$errors->get('diagnostic')" class="mt-2" />
                        </div>
                        <div class="text-center">
                            <x-primary-button class="mt-4">
                                guardar
                            </x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
