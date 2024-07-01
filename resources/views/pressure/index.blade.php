<x-app-layout>
 <x-slot name="header">
         <h2 class="capitalize font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             presión arterial
         </h2>
     </x-slot>
    {{-- create button --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <x-primary-a href="{{ route('pressure.create') }}">
                         nueva medición arterial
                    </x-primary-a>
                </div>
            </div>
        </div>
    </div>

    {{-- diabetes display --}}
    @foreach ($pressures as $pressure)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col p-6 text-gray-900 dark:text-gray-100">
                        <p>fecha {{ $pressure->date->format('d-m-Y') }} hora {{ $pressure->time }}</p>
                        <p>presion sistólica {{ $pressure->systolic }}</p>
                        <p>presion diastólica {{ $pressure->diastolic }}</p>
                        <p>pulsaciónes {{ $pressure->heart }}</p>
                        @if ($pressure->comment != null)
                            <p>comentarios {{ $pressure->comment}}</p> 
                            @else                           
                            <p>sin comentarios</p>
                        @endif
                        @if ($pressure->created_at != $pressure->updated_at)
                            <p>editado {{$pressure->updated_at->diffForHumans()}}</p>
                        @endif
                        <div class="flex w-auto justify-start gap-5 mt-4">
                            <x-primary-a href="{{ route('pressure.edit', $pressure) }}">
                                editar
                            </x-primary-a>
                            <form action="{{ route('pressure.destroy', $pressure) }}" method="POST">
                                @csrf
                                @method('delete')
                                <x-button-delete href="{{ route('pressure.destroy', $pressure) }}">
                                </x-button-delete>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



</x-app-layout>
