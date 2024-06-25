<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
 <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{route('diabete.create')}}">crear</a>
    
                </div>
            </div>
        </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{route('diabete.create')}}">crear</a>
                    @foreach ($diabetes as $diabete)
                        <p>fecha {{$diabete->date->format('d-m-Y')}} hora {{$diabete->time}}</p>
                        <p>azúcar en sangre {{$diabete->bsl}}</p>
                        <p>comentarios {{$diabete->comment}}</p>
                        <a class="bg-teal-200" href="{{route('diabete.edit',$diabete)}}">editar</a>
                        <form action="{{route('diabete.destroy',$diabete)}}" method="POST">
                            @csrf   
                            @method('delete')
                            <button class="bg-red-200" type="submit">eliminar</a>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>