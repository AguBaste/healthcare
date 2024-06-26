 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             medición presion arterial
         </h2>
     </x-slot>

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900 dark:text-gray-100">
                     <form method="POST" action="{{ route('pressure.update',$pressure) }}">
                         @csrf
                         @method('patch')
                         <!-- systolic -->
                         <div>
                             <x-input-label for="systolic" value="presión sistólica" />
                             <x-text-input class="block mt-1 w-full" value="{{old('systolic',$pressure->systolic)}}" type="number" step="0.1" min="0"
                                 name="systolic" required autofocus />
                             <x-input-error :messages="$errors->get('systolic')" class="mt-2" />
                         </div>

                         <!-- diastolic -->
                         <div>
                             <x-input-label for="diastolic" value="presión distólica" />
                             <x-text-input class="block mt-1 w-full" value="{{old('diastolic',$pressure->diastolic)}}" type="number" step="1" min="0"
                                 name="diastolic" required autofocus />
                             <x-input-error :messages="$errors->get('diastolic')" class="mt-2" />
                         </div>

                         <!-- heart -->
                         <div>
                             <x-input-label for="heart" value="pulsaciónes" />
                             <x-text-input class="block mt-1 w-full" value="{{old('heart',$pressure->heart)}}" type="number" step="1" min="0"
                                 name="heart" required autofocus />
                             <x-input-error :messages="$errors->get('heart')" class="mt-2" />
                         </div>


                         <!-- date -->
                         <div class="mt-4">
                             <x-input-label for="date" value="fecha" />
                             <x-text-input class="block mt-1 w-full" value="{{old('date',$pressure->date->format('Y-m-d'))}}" type="date" name="date" required />
                             <x-input-error :messages="$errors->get('date')" class="mt-2" />
                         </div>

                         <!-- time -->
                         <div class="mt-4">
                             <x-input-label for="time" value="hora" />
                             <x-text-input class="block mt-1 w-full" value="{{old('time',$pressure->time)}}" type="time" name="time" required />
                             <x-input-error :messages="$errors->get('time')" class="mt-2" />
                         </div>

                         <!-- comment -->
                         <div class="mt-4">
                             <x-input-label for="comment" value="comentario" />
                             <x-text-input class="block mt-1 w-full" value="{{old('comment',$pressure->comment)}}" type="text" name="comment" />
                             <x-input-error :messages="$errors->get('comment')" class="mt-2" />
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
