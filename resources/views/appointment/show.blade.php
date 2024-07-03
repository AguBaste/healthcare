<x-app-layout>

    @if ($chart == null)
        <div class="flex items-center justify-around">
            <p>el paciente no tiene un historial médico</p>
            <form action="{{ route('chart.onlyChart') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $appointment->user_id }}">
                <x-primary-button>
                    crear historial
                </x-primary-button>
            </form>
        </div>
    @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 flex justify-around text-gray-900 dark:text-gray-100">
                        <div class="">
                            <form action="{{ route('prescription.onlyPrescription') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$appointment->user_id}}">
                                <x-primary-button>
                                    generar receta
                                </x-primary-button>
                            </form>
                        </div>
                         <div class="">
                            <form action="{{ route('order.onlyOrder') }}" method="POST">
                                @csrf
                                
                                <input type="hidden" name="user_id" value="{{$appointment->user_id}}">
                                <x-primary-button>
                                    generar orden
                                </x-primary-button>
                            </form>
                        </div>
                        <div class="">
                            <form action="{{ route('appointment.update', $appointment) }}" method="POST">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="realizada">
                                <input type="hidden" name="date" value="{{$appointment->date}}">
                                <input type="hidden" name="time" value="{{$appointment->time}}">
                                <input type="hidden" name="user_id" value="{{$appointment->user_id}}">
                                <input type="hidden" name="provider_id" value="{{$appointment->provider_id}}">


                                <x-primary-button>
                                    terminar cita
                                </x-primary-button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-center capitalize text-3xl m-4">paciente número {{ $chart->id }}</h1>
                        <div class="w-full">
                            <table class="table-auto w-full text-center">
                                <thead>
                                    <tr>
                                        <th class="uppercase">nombre</th>
                                        <th class="uppercase">dni</th>
                                        <th class="uppercase">obra social</th>
                                        <th class="uppercase">número de afiliado</th>
                                        <th class="uppercase">altura</th>
                                        <th class="uppercase">peso</th>
                                        <th class="uppercase">lentes</th>
                                        <th class="uppercase">fuma</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="capitalize">{{ $chart->user->lastname . ' ' . $chart->user->name }}
                                        </td>
                                        <td>{{ $chart->user->dni }}</td>
                                        <td class="capitalize">{{ $chart->user->insurance }}</td>
                                        <td>{{ $chart->user->member_id }}</td>
                                        <td>{{ $chart->height }}mts</td>
                                        <td>{{ $chart->weight }}kg</td>
                                        <td>{{ $chart->glasses }}</td>
                                        <td>{{ $chart->smoke }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h1 class="capitalize text-3xl text-center m-4">diagnosticos</h1>
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
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
