<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    @include('layouts.navigationProvider')
    {{-- create button --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-center dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col p-6 text-gray-900 dark:text-gray-100">
                 
                    <div id="mydraggable" draggable="true">aida</div>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
    <script src='fullcalendar/core/index.global.js'></script>
    <script src='fullcalendar/core/locales-all.global.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let draggableEl = document.getElementById('mydraggable');
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next,today',
                    center: 'title',
                    right: 'timeGridDay,dayGridWeek,dayGridMonth'
                },
                droppable: true,
                events: @json($events)
            
            });

            calendar.render();
            let draggable = new Draggable(draggableEl);
            // when you're done...
            // draggable.destroy();
        });
    </script>
</body>

</html>
