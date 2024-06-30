<x-app-layout>

    {{-- create button --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <a class="bg-teal-500 rounded p-2 text-white" href="{{ route('diabete.create') }}">anotar nueva medición de diabetes</a>

                </div>
            </div>
        </div>
    </div>

    {{-- diabetes display --}}
    @foreach ($diabetes as $diabete)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col p-6 text-gray-900 dark:text-gray-100">
                        <p>fecha {{ $diabete->date->format('d-m-Y') }} hora {{ $diabete->time }}</p>
                        <p>azúcar en sangre {{ $diabete->bsl }}</p>
                        @if ($diabete->comment != null)
                            <p>comentarios {{ $diabete->comment}}</p> 
                            @else                           
                            <p>sin comentarios</p>
                        @endif
                        @if ($diabete->created_at != $diabete->updated_at)
                            <p>editado {{$diabete->updated_at->diffForHumans()}}</p>
                        @endif
                        <a class="bg-teal-200" href="{{ route('diabete.edit', $diabete) }}">editar</a>
                        <form action="{{ route('diabete.destroy', $diabete) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="bg-red-200" type="submit">eliminar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



</x-app-layout>
