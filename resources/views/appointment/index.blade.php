<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col  p-6 text-gray-900 dark:text-gray-100">
                    @if (auth()->user()->role == 'secretary')
                    <div class="text-center p-6">
                        <a class="bg-gray-700 p-2 inline rounded text-white" href="{{ route('appointment.create') }}">agendar nuevo turno </a>
                    </div>
                    @endif
                    <div class="h-auto" id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridWeek',
                height: 500,
                headerToolbar: {
                    left: 'prev,next,today',
                    center: 'title',
                    right: 'dayGridWeek,dayGridMonth'
                },
               
                events: @json($events)
            });
            calendar.setOption('locale', 'es');
            calendar.render();
        });
    </script>
</x-app-layout>
