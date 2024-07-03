<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col  p-6 text-gray-900 dark:text-gray-100">
                     <form method="POST" action="{{ route('prescription.store') }}">
                         @csrf
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
                             <x-text-input class="block mt-1 w-full" type="date" name="date" required/>
                             <x-input-error :messages="$errors->get('date')" class="mt-2" />
                         </div>

                         <!-- formula -->
                         <div class="mt-4">
                             <x-input-label for="formula" value="formula" />
                             <x-text-input class="block mt-1 w-full" type="text" name="formula" required/>
                             <x-input-error :messages="$errors->get('formula')" class="mt-2" />
                         </div>

                         <!-- dosis -->
                         <div class="mt-4">
                             <x-input-label for="dosis" value="dosis" />
                             <x-text-input class="block mt-1 w-full" type="text" name="dosis" required/>
                             <x-input-error :messages="$errors->get('dosis')" class="mt-2" />
                         </div>

                         <!-- diagnostic -->
                         <div class="mt-4">
                             <x-input-label for="diagnostic" value="diagnostico" />
                             <x-text-input class="block mt-1 w-full" type="text" name="diagnostic" required/>
                             <x-input-error :messages="$errors->get('diagnostic')" class="mt-2" />
                         </div>

                         <div class="flex items-center justify-center mt-4">
                             <x-primary-button class="ms-3">
                                 guardar
                             </x-primary-button>
                         </div>
                     </form>
                </div>
            </div>
        </div>
    </div>           
</x-app-layout>