<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (auth()->user()->role == 'patient')

                        @if ($chart == null)
                            luego de tu primera visita al médico podras ver tu cartilla
                        @else
                              <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-center text-3xl m-4">Cartilla número {{ $chart->id }}</h1>
                    <div class="w-full">
                        <table class="table-auto w-full text-center">
                            <thead>
                                <tr>
                                    <th class="uppercase">paciente</th>
                                    <th class="uppercase">dni</th>
                                    <th class="uppercase">obra social</th>
                                    <th class="uppercase">número de afiliado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="capitalize">{{ $chart->user->lastname . ' ' . $chart->user->name }}</td>
                                    <td>{{ $chart->user->dni }}</td>
                                    <td class="capitalize">{{ $chart->user->insurance }}</td>
                                    <td>{{ $chart->user->member_id }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h1 class="upperase text-3xl text-center m-4">diagnosticos</h1>
                        <table class="table-auto w-full text-center">
                            <thead>
                                <tr>
                                    <th class="uppercase">fecha</th>
                                    <th class="uppercase">diagnostico</th>
                                    <th class="uppercase">tratamiento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prescriptions as $prescription)
                                    <tr>
                                        <td>{{ $prescription->date->format('d-m-Y') }}</td>
                                        <td class="capitalize">{{ $prescription->diagnostic }}</td>
                                        <td>{{ $prescription->formula . ' ' . $prescription->dosis }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                        @endif
                    @elseif (auth()->user()->role == 'provider')
                        <div class="text-center">
                            <a class="bg-teal-500 rounded p-2 text-white uppercase" href="{{route('chart.create')}}">crear nueva cartilla</a>
                        </div>
                        <ul>
                            @foreach ($charts as $chart)
                                <div class="flex items-center justify-between m-6 p-3">
                                    <li class="capitalize font-bold">{{ $chart->user->lastname . ' ' . $chart->user->name . ' ' . $chart->user->dni }}</li>
                                    <li><a class="bg-teal-500 rounded text-white p-2 uppercase" href="{{ route('chart.show', $chart) }}">ver cartilla</a></li>
                                </div>
                            @endforeach
                        </ul>
                        {{$charts->links()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
