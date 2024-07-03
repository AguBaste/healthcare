<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-center  p-6 text-gray-900 dark:text-gray-100">
                    @if (auth()->user()->role == 'secretary')
                        <x-primary-a href="{{ route('appointment.create') }}">
                            crear nueva cita
                        </x-primary-a>
                        <div id="calendar"></div>
                        {{-- <div class="flex flex-col gap-2 mt-4">
                            @foreach ($appointments as $apo)
                                <div class="flex justify-between">
                                    <p>{{ $apo->date }} {{ $apo->time }}
                                        {{ $apo->user->lastname . ' ' . $apo->user->name }}</p>
                                    <x-primary-a href="{{ route('appointment.show', $apo) }}">
                                        comenzar cita
                                    </x-primary-a>
                                </div>
                            @endforeach
                        </div> --}}
                    @else
                        @if (auth()->user()->role == 'provider')
                            <div class="flex flex-col gap-2 mt-4">
                                @if (count($appointments) ==0 )
                                 <h2 class="text-2xl uppercase">no tienes turnos</h2>
                                    
                                @else
                                   @foreach ($appointments as $apo)
                                        <div class="flex justify-between">
                                            <p>{{ $apo->date }} {{ $apo->time }}
                                                {{ $apo->user->lastname . ' ' . $apo->user->name }}</p>
                                            <x-primary-a href="{{ route('appointment.show', $apo) }}">
                                                comenzar cita
                                            </x-primary-a>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        @else
                        @endif

                    @endif

                </div>
            </div>
        </div>
    </div>
 <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events:@json($events),
        });
        calendar.render();
      });

    </script>
</x-app-layout>
