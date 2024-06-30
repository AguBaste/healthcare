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
                    {{-- {{$prescription->user->chart}} --}}
                    <p>clinica san jorge </p>
                    <p>colon 1234, san luis</p>
                    <p>tel 2664331306</p>
                    <p>paciente {{$prescription->patient}}</p>
                    <p>obra social {{$prescription->insurance}}</p>
                    <p>fecha {{$prescription->date->format('d-m-Y')}}</p>
                    <p>RP</p>
                    <p>{{$prescription->formula}}</p>
                    <p>{{$prescription->dosis}}</p>
                    <p>diagnostico {{$prescription->diagnostic}}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>