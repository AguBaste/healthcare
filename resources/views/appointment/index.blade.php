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
                    @foreach ($appointments as $apo)
                        <p>fecha -> {{$apo->day}}</p>
                        <p>hora -> {{$apo->time}}</p>
                        <p>paciente -> {{$apo->user->name}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</body>
</html>
   