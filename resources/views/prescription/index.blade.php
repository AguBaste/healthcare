<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col items-center p-6 text-gray-900 dark:text-gray-100">
                    <a class="bg-teal-500 p-2 text-white rounded" href="{{ route('prescription.create') }}">crear nueva
                        receta</a>
                </div>
                <div class="w-auto">
                    <table class="table-auto text-center w-full">
                        <thead>
                            <tr>
                                <th>fecha</th>
                                <th>paciente</th>
                                <th>formula</th>
                                <th>dosis</th>
                                <th>diagnostico</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prescriptions as $prescription)
                                <tr>
                                    <td>{{ $prescription->date->format('d-m-Y') }}</td>
                                    <td>{{ $prescription->user->lastname . ' ' . $prescription->user->name }}</td>
                                    <td>{{ $prescription->formula }}</td>
                                    <td>{{ $prescription->dosis }}</td>
                                    <td>{{ $prescription->diagnostic }}</td>
                                    <td class="p-6"><a class="bg-teal-500 rounded p-2 text-white "
                                            href="{{ route('prescription.edit', $prescription) }}">editar</a></td>
                                    <td><a class="bg-teal-900 rounded p-2 text-white "
                                            href="{{ route('prescription.show', $prescription) }}">imprimir</a></td>
                                    @if ($prescription->created_at != $prescription->updated_at)
                                        <td>editado {{ $prescription->updated_at->diffForHumans() }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="m-6">
                        {{ $prescriptions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
