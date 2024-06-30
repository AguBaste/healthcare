<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Diagnostic;
use App\Models\Alergy;
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
  
       
        User::factory()->create([
            'name' => 'agustín',
            'lastname'=>'basterrica',
            'dob'=>'1986/09/01',
            'phone'=>2664331306,
            'insurance'=>'dosep',
            'plan'=>'basico',
            'member_id'=>'32378366',
            'dni'=>'32378366',
            'role'=>'secretary',
            'password'=>'123456789',
            'email' => 'agustinbasterrica@hotmail.com',
        ]);
         User::factory()->create([
            'name' => 'aida',
            'lastname'=>'bianconi',
            'dob'=>'1965/01/27',
            'phone'=>26645443232,
            'insurance'=>'pami',
            'plan'=>'A354Z',
            'member_id'=>'451264',
            'dni'=>'11615518',
            'role'=>'patient',
            'password'=>'123456789',
            'email' => 'aidabianconi@hotmail.com',
        ]);
        User::create([
            'name' => 'carolina',
            'lastname'=>'quiroga',
            'dob'=>'1992/12/09',
            'phone'=>2657639227,
            'insurance'=>'dosep',
            'plan'=>'A354Z',
            'member_id'=>'37090163',
            'dni'=>'37091163',
            'role'=>'patient',
            'password'=>'123456789',
            'email' => 'caro_09_28@hotmail.com',
        ]);
         User::factory()->create([
            'name' => 'enzo',
            'lastname'=>'rottino',
            'dob'=>'1975/01/12',
            'dni'=>'27090163',
            'role'=>'provider',
            'insurance'=>'swiss medical',
            'plan'=>'SG8080',
            'member_id'=>'S354267',
            'phone'=>26646598754,
            'license'=>'445685',
            'specialty'=>'neurocirujano',
            'password'=>'123456789',
            'email' => 'enzorottino@hotmail.com',
        ]);
        User::factory()->create([
            'name' => 'manuel',
            'lastname'=>'lorenzo',
            'dob'=>'1975/01/12',
            'dni'=>'27890162',
            'phone'=>2667451256,
            'insurance'=>'medifé',
            'plan'=>'platino',
            'member_id'=>'P7845',
            'license'=>'7845452',
            'specialty'=>'cirujano',
            'role'=>'provider',
            'password'=>'123456789',
            'email' => 'manuellorenzo@hotmail.com',
        ]);
    }
}
