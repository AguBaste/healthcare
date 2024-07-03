<x-app-layout>
    <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if ($orders[0] != null)
               ordenes de <span class="capitalize">{{$orders[0]->user->lastname .' ' .$orders[0]->user->name}}</span>
                @else
                No hay de ordenes de este paciente
            @endif
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
                <th class="uppercase">estudio</th>
                <th class="uppercase">diagnostico</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->date->format('d-m-Y') }}</td>
                    <td class="capitalize">{{ $order->user->lastname . ' ' . $order->user->name }}</td>
                    <td class="capitalize">{{ $order->study }}</td>
                    <td class="capitalize">{{ $order->diagnostic }}</td>
                    <td class="p-6"><x-primary-a
                            href="{{ route('order.edit', $order) }}">editar</x-primary-a></td>
                    <td><x-primary-a class="bg-teal-900"
                            href="{{ route('order.show', $order) }}">imprimir</x-primary-a></td>
                    @if ($order->created_at != $order->updated_at)
                        <td class="capitalize">editado {{ $order->updated_at->diffForHumans() }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="m-6">
        {{ $orders->links() }}
    </div>
</div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>



