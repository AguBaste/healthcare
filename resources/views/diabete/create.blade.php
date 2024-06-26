 <x-app-layout>
     <x-slot name="header">
         <h2 class="capitalize font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             medición diabetes
         </h2>
     </x-slot>

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900 dark:text-gray-100">
                     <form class="capitalize" method="POST" action="{{ route('diabete.store') }}">
                         @csrf

                         <!-- blood sugar level -->
                         <div>
                             <x-input-label for="bsl" value="nivel de azúcar en sangre" />
                             <x-text-input class="block mt-1 w-full" type="number" step="0.1" min="0" name="bsl" required autofocus  />
                             <x-input-error :messages="$errors->get('bsl')" class="mt-2" />
                         </div>

                         <!-- date -->
                         <div class="mt-4">
                             <x-input-label for="date" value="fecha" />
                             <x-text-input class="block mt-1 w-full" type="date" name="date" required/>
                             <x-input-error :messages="$errors->get('date')" class="mt-2" />
                         </div>

                         <!-- time -->
                         <div class="mt-4">
                             <x-input-label for="time" value="hora" />
                             <x-text-input class="block mt-1 w-full" type="time" name="time" required/>
                             <x-input-error :messages="$errors->get('time')" class="mt-2" />
                         </div>

                         <!-- comment -->
                         <div class="mt-4">
                             <x-input-label for="comment" value="comentario" />
                             <x-text-input class="block mt-1 w-full" type="text" name="comment"/>
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
