<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Specialty;
use App\Models\Diagnostic;
use App\Models\Insurance;
use App\Models\Alergy;
use App\Models\Provider;
use App\Models\Schedule;
use App\Models\Appointment;






// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
  
        Specialty::factory()->create([
            'description'=>'nuerocirujano'
        ]);
        Insurance::factory()->create([
           'description' => 'dosep'
        ]);
        Insurance::factory()->create([
           'description' => 'osde'
        ]);
        Insurance::factory()->create([
           'description' => 'pami'
        ]);
        Insurance::factory()->create([
           'description' => 'swiss medical'
        ]);
        Insurance::factory()->create([
           'description' => 'osfatum'
        ]);
       
        User::factory()->create([
            'name' => 'agustín',
            'lastname'=>'basterrica',
            'dob'=>'1986/09/01',
            'dni'=>'32378366',
            'role'=>'secretary',
            'password'=>'sprinter413',
            'email' => 'agustinbasterrica@hotmail.com',
        ]);
         User::factory()->create([
            'name' => 'aida',
            'lastname'=>'bianconi',
            'dob'=>'1965/01/27',
            'dni'=>'11615518',
            'role'=>'patient',
            'password'=>'sprinter413',
            'email' => 'aidabianconi@hotmail.com',
        ]);
         User::factory()->create([
            'name' => 'enzo',
            'lastname'=>'rottino',
            'dob'=>'1975/01/12',
            'dni'=>'27090163',
            'role'=>'provider',
            'password'=>'sprinter413',
            'email' => 'enzorottino@hotmail.com',
        ]);
        User::factory()->create([
                    'name' => 'lorenzo',
                    'lastname'=>'enrique',
                    'dob'=>'1975/01/12',
                    'dni'=>'27090162',
                    'role'=>'provider',
                    'password'=>'sprinter413',
                    'email' => 'lorenzoenrique@hotmail.com',
                ]);
        Provider::factory()->create([
            'licence'=>'268642',
            'user_id'=>4,
            'specialty_id'=>1
        ]);        
        Provider::factory()->create([
            'licence'=>'258642',
            'user_id'=>3,
            'specialty_id'=>1
        ]);
        Schedule::factory()->create([
            'day'=>'lunes',
            'start'=>'8:00:00',
            'end'=>'16:00:00',
            'break_start'=>'12:00:00',
            'break_end'=>'13:00:00',
            'provider_id'=>3
        ]);
         Schedule::factory()->create([
            'day'=>'martes',
            'start'=>'8:00:00',
            'end'=>'16:00:00',
            'break_start'=>'12:00:00',
            'break_end'=>'13:00:00',
            'provider_id'=>3
        ]);
         Schedule::factory()->create([
            'day'=>'miercoles',
            'start'=>'8:00:00',
            'end'=>'16:00:00',
            'break_start'=>'12:00:00',
            'break_end'=>'13:00:00',
            'provider_id'=>3
        ]);
    }
}
