<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css'])
    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .contenedor {
            margin-top: 0;
            width: 500px;
            margin: auto;
        }
    </style>
</head>

<body>
    <nav id="barra" x-data="{ open: false }"
        class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="capitalize flex justify-between  p-2 h-auto">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('welcome') }}">
                            <img class="h-20 w-20" src="{{ asset('img/logo.jpeg') }}" alt="">
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class=" hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('appointment.index')" :active="request()->routeIs('appointment.index')">
                            mis turnos
                        </x-nav-link>
                        <x-nav-link :href="route('chart.index')" :active="request()->routeIs(['chart.index', 'chart.create', 'chart.show'])">
                            historial pacientes
                        </x-nav-link>
                        <x-nav-link :href="route('prescription.index')" :active="request()->routeIs([
                            'prescription.index',
                            'prescription.create',
                            'prescription.search',
                            'prescription.edit',
                        ])">
                            receta
                        </x-nav-link>
                        <x-nav-link :href="route('order.index')" :active="request()->routeIs(['order.index', 'order.create', 'order.edit', 'order.search'])">
                            orden
                        </x-nav-link>
                        <x-nav-link href="https://servicios.pami.org.ar/vademecum/views/consultaPublica/listado.zul">
                            vademecum
                        </x-nav-link>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div class="capitalize">hola {{ Auth::user()->name }}!</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                perfil
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    cerrar sesión
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('appointment.index')" :active="request()->routeIs('appointment.index')">
                    Mis Turnos
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('chart.index')" :active="request()->routeIs(['chart.index', 'chart.create', 'chart.show'])">
                    Cartilla
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('appointment.index')" :active="request()->routeIs('chart.create')">
                    Receta
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('order.index')" :active="request()->routeIs(['order.index', 'order.create', 'order.edit', 'order.show'])">
                    Orden
                </x-responsive-nav-link>
                <x-responsive-nav-link href="https://servicios.pami.org.ar/vademecum/views/consultaPublica/listado.zul"
                    :active="request()->routeIs('chart.create')">
                    Vademecum
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div id="status">
        @if (session('status'))
            <div class="bg-green-500 text-center p-4 shadow text-white uppercase">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="contenedor">
        <ul class="flex justify-between capitalize">
            <li>clinica san jorge </li>
            <li>colon 1234, san luis</li>
            <li>tel: 2664331306</li>
        </ul>
        <ul class="flex flex-col gap-2 mt-4">
            <li class="capitalize">paciente: <span
                    class="font-bold">{{ $prescription->user->name . ' ' . $prescription->user->lastname }}</span></li>
            <li class="uppercase">dni: <span font-bold>{{ $prescription->user->dni }}</span> </li>
            <li class="capitalize">obra social: <span class="font-bold">{{ $prescription->user->insurance }}</span>
            </li>
            <li class="capitalize">plan: <span class="font-bold">{{ $prescription->user->plan }}</span> </li>
            <li class="capitalize">número de afiliado: <span class="font-bold">
                    {{ $prescription->user->member_id }}</span></li>
        </ul>
        <ul class="flex flex-col gap-2 mt-4">
            <li class="capitalize font-bold">fecha {{ $prescription->date->format('d-m-Y') }}</li>
            <li class="uppercase font-bold">RP</li>
            <li class="italic">{{ $prescription->formula }}</li>
            <li class="italic">{{ $prescription->dosis }}</li>
            <li class="italic"><span class="font-bold">diagnostico: </span>{{ $prescription->diagnostic }}</li>
        </ul>
        <ul class="flex justify-between mt-4 capitalize">
            <li class="capitilize">dr: <span
                    class="font-bold">{{ auth()->user()->name . ' ' . auth()->user()->lastname }}</span></li>
            <li class="font-bold capitalize">{{ auth()->user()->specialty }}</li>
            <li class="capitalize">matrícula: <span class="font-bold">{{ auth()->user()->license }}</span></li>
        </ul>
        <p class="font-bold capitalize mt-24">Firma:</p>
        <div class="flex justify-around">
            <x-primary-a id="print" class="mt-4">
                imprimir
            </x-primary-a>
            <x-primary-a id="edit" href="{{ route('prescription.edit', $prescription) }}" class="mt-4">
                editar
            </x-primary-a>
        </div>


    </div>

    <script>
        const button = document.getElementById('print');
        const barra = document.getElementById('barra');
        const edit = document.getElementById('edit');
        const status = document.getElementById('status');
        button.addEventListener('click', function() {
            button.style.display = 'none';
            status.style.display = 'none';
            edit.style.display = 'none';
            barra.style.display = 'none';
            window.print();
        })
    </script>
</body>

</html>
