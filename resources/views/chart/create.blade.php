<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('chart.store') }}">
                         @csrf

                         <!-- blood sugar level -->
                         <div>
                             <x-input-label for="user_id" value="paciente" />
                             <select name="user_id" required>
                                @foreach ($patients as $patient)
                                    <option value="{{$patient->id}}">{{$patient->name . ' ' . $patient->lastname . ' '. $patient->dni}}</option>
                                @endforeach
                             </select>
                             <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                         </div>

                         <!-- insurance -->
                         <div class="mt-4">
                             <x-input-label for="insurance" value="obra social" />
                             <select name="insurance">
                                @foreach ($insurances as $insurance)
                                    <option value="{{$insurance->id}}"{{$insurance->description == 'ninguna' ? 'selected' : ''}}>{{$insurance->description}}</option>
                                @endforeach
                             </select>
                             <x-input-error :messages="$errors->get('insurance')" class="mt-2" />
                         </div>

                         <!-- member_id -->
                         <div class="mt-4">
                             <x-input-label for="member_id" value="número de socio" />
                             <x-text-input class="block mt-1 w-full" type="text" name="member_id"/>
                             <x-input-error :messages="$errors->get('member_id')" class="mt-2" />
                         </div>

                         <!-- weight -->
                         <div class="mt-4">
                             <x-input-label for="weight" value="peso" />
                             <x-text-input class="block mt-1 w-full" type="number" step="0.01" min="0" name="weight"/>
                             <x-input-error :messages="$errors->get('weight')" class="mt-2" />
                         </div>

                          <!-- height -->
                         <div class="mt-4">
                             <x-input-label for="height" value="altura" />
                             <x-text-input class="block mt-1 w-full" type="number" step="0.01" min="0" name="height"/>
                             <x-input-error :messages="$errors->get('height')" class="mt-2" />
                         </div>

                         <!-- smoke -->
                         <div class="mt-4">
                             <x-input-label for="smoke" value="fuma" />
                             <select name="smoke">
                                <option value="si">si</option>
                                <option value="no" selected>no</option>
                             </select>
                             <x-input-error :messages="$errors->get('smoke')" class="mt-2" />
                         </div>

                          <!-- glasses -->
                         <div class="mt-4">
                             <x-input-label for="glasses" value="anteojos" />
                             <select name="glasses">
                                <option value="si">si</option>
                                <option value="no" selected>no</option>
                             </select>
                             <x-input-error :messages="$errors->get('glasses')" class="mt-2" />
                         </div>


                         <div class="flex items-center justify-center mt-4">
                             <x-primary-button class="ms-3">
                                 siguiente
                             </x-primary-button>
                         </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

