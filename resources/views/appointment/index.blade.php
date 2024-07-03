<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-center  p-6 text-gray-900 dark:text-gray-100">
                    @if (auth()->user()->role == 'secretary')
                        <x-primary-a href="{{ route('appointment.create') }}">
                            crear nueva cita
                        </x-primary-a>
    
                    @endif
                      <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
  <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var calendarEl = document.getElementById('calendar');
                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    initialView: 'listDay',
                                    buttonText: {
                                        prev: 'previo',
                                        next: 'siguiente',
                                        week: 'semana',
                                        day: 'día',
                                        today: 'hoy',
                                        month: 'mes'
                                    },
                                    headerToolbar: {
                                        left: 'prev,today,next',
                                        center: 'title',
                                        right:'listDay,timeGridWeek,dayGridMonth' // user can switch between the two
                                    },
                                    locale: 'es',
                                    events: @json($events),
                                });
                                calendar.render();
                            });
                        </script>
</x-app-layout>
