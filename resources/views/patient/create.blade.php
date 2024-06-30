<x-app-layout>
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <form method="POST" action="{{ route('patient.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

         <!-- lastname -->
        <div>
            <x-input-label for="lastname" value="apellido" />
            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" value="{{old('lastname')}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

         <!-- dni -->
        <div>
            <x-input-label for="dni" value="documento" />
            <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" value="{{old('dni')}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
        </div>

         <!-- dob -->
        <div>
            <x-input-label for="dob" value="fecha de naciemiento" />
            <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" value="{{old('dob')}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
        </div>
         <!-- phone -->
        <div>
            <x-input-label for="phone" value="télefono" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                value="{{ old('phone') }}" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <!-- insurance -->
        <div>
            <x-input-label for="insurance" value="obra social" />
            <x-text-input id="insurance" class="block mt-1 w-full" type="text" name="insurance"
                value="{{ old('insurance') }}" autofocus autocomplete="insurance" />
            <x-input-error :messages="$errors->get('insurance')" class="mt-2" />
        </div>
         <!-- plan -->
        <div>
            <x-input-label for="plan" value="plan" />
            <x-text-input id="plan" class="block mt-1 w-full" type="text" name="plan"
                value="{{ old('plan') }}" autofocus autocomplete="plan" />
            <x-input-error :messages="$errors->get('plan')" class="mt-2" />
        </div>
         <!-- member_id -->
        <div>
            <x-input-label for="member_id" value="número de afiliado" />
            <x-text-input id="member_id" class="block mt-1 w-full" type="text" name="member_id"
                value="{{ old('member_id') }}" autofocus autocomplete="member_id" />
            <x-input-error :messages="$errors->get('member_id')" class="mt-2" />
        </div>
        <input type="hidden" value="patient" name="role">

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
       
            <button class="bg-teal-500 rounded p-2 text-white uppercase" type="submit">registrar</button>
        </div>
    </form>
                </div>
            </div>
        </div>
    </div>
     
</x-app-layout>