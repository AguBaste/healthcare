<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-cyan-500 dark:text-gray-200 leading-tight">
                Estás en buenas manos
            </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                     <form method="POST" action="{{ route('appointment.update',$appointment) }}">
                         @csrf
                        @method('patch')
                         <!-- provider -->
                         <div>
                            
                             <x-input-label for="provider_id" value="doctor" />
                             <select class="block mt-1 w-full" name="provider_id">
                                @foreach ($providers as $item)
                                    <option value="{{old('provider_id',$item->id)}}">{{$item->lastname . ' '.$item->name}}</option>
                                @endforeach
                             </select>
                             <x-input-error :messages="$errors->get('provider_id')" class="mt-2" />
                         </div>

                         <!-- patient -->
                         <div>
                            
                             <x-input-label for="user_id" value="paciente" />
                             <x-text-input class="block mt-1 w-full" type="text" value="{{$appointment->user->lastname .' '. $appointment->name}}" name="user_id"  required/>
                             <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                         </div>
                         
                         <!-- date -->
                         <div class="mt-4">
                             <x-input-label for="date" value="fecha" />
                             <x-text-input class="block mt-1 w-full" type="date" :value="old('date')" name="date" required/>
                             <x-input-error :messages="$errors->get('date')" class="mt-2" />
                         </div>

                         <!-- time -->
                         <div class="mt-4">
                             <x-input-label for="time" value="hora" />
                             <x-text-input class="block mt-1 w-full" type="time" :value="old('time')" name="time" required/>
                             <x-input-error :messages="$errors->get('time')" class="mt-2" />
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