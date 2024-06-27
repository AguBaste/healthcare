<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
       @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    
@include('layouts.navigationSecretary')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    {{-- create button --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('appointment.store') }}">
                         @csrf

                         <!-- provider -->
                         <div>
                            
                             <x-input-label for="provider_id" value="doctor" />
                             <select name="provider_id">
                                @foreach ($providers as $item)
                                    <option value="{{$item->id}}">{{$item->user->name .' '.$item->user->lastname .' ( '. $item->specialty->description .' )' }}</option>
                                @endforeach
                             </select>
                             <x-input-error :messages="$errors->get('provider_id')" class="mt-2" />
                         </div>

                         <!-- patient -->
                         <div>
                            
                             <x-input-label for="patient_id" value="paciente" />
                             <select name="patient_id">
                                @foreach ($patients as $patient)
                                    <option value="{{$patient->id}}">{{$patient->name .' '.$patient->lastname .' '. $patient->dni }}</option>
                                @endforeach
                             </select>
                             <x-input-error :messages="$errors->get('patient_id')" class="mt-2" />
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

</body>
</html>
