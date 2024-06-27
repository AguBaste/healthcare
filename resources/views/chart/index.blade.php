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
                    @if ($chart == null)
                        luego de tu primera visita al médico podras ver tu cartilla 
                        @else
                        <p>número de cartilla -> {{$chart->id}}</p>
                        <p>obra social -> {{$chart->insurance->description}}</p>
                        <p>número de afiliado -> {{$chart->member_id}}</p>
                        <p>altura -> {{$chart->height}} mts</p>
                        <p>peso -> {{$chart->weight}}</p>
                        <p>fuma -> {{$chart->smoke}}</p>
                        <p>anteojos -> {{$chart->glasses}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>