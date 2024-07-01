<x-app-layout>
       <x-slot name="header">
        <h2 class="capitalize font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            descripción del area donde esta 
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <div class="w-auto">
                    <table class="table-auto text-center w-full">
                        <thead>
                            <tr>
                                <th class="uppercase">fecha</th>
                                <th class="uppercase">paciente</th>
                                <th class="uppercase">formula</th>
                                <th class="uppercase">dosis</th>
                                <th class="uppercase">diagnostico</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prescriptions as $prescription)
                                <tr>
                                    <td>{{ $prescription->date->format('d-m-Y') }}</td>
                                    <td class="capitalize">{{ $prescription->user->lastname . ' ' . $prescription->user->name }}</td>
                                    <td class="capitalize">{{ $prescription->formula }}</td>
                                    <td>{{ $prescription->dosis }}</td>
                                    <td class="capitalize">{{ $prescription->diagnostic }}</td>
                                    <td class="p-6"><x-primary-a
                                            href="{{ route('prescription.edit', $prescription) }}">editar</x-primary-a></td>
                                    <td><x-primary-a class="bg-teal-900"
                                            href="{{ route('prescription.show', $prescription) }}">imprimir</x-primary-a></td>
                                    @if ($prescription->created_at != $prescription->updated_at)
                                        <td class="capitalize">editado {{ $prescription->updated_at->diffForHumans() }}</td>
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
    </div>
   
</x-app-layout>