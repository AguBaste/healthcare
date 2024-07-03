<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-cyan-500 dark:text-gray-200 leading-tight">
                Mis horarios
            </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <form action="" method="post">
                    <x-label-input for="day" value="día"/>  
                    <x-text-input type="text" name="day" value="">
                   </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>