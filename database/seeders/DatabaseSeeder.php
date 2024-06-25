<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Specialty;
use App\Models\Diagnostic;
use App\Models\Insurance;
use App\Models\Role;
use App\Models\Alergy;





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
        Role::factory()->create([
            'description'=>'patient'
        ]);
        Role::factory()->create([
            'description'=>'doctor'
        ]);
        Role::factory()->create([
            'description'=>'director'
        ]);
        Role::factory()->create([
            'description'=>'secretary'
        ]);
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
        Diagnostic::factory()->create([
            'description'=>'gripe'
        ]);
        Diagnostic::factory()->create([
            'description'=>'angina'
        ]);
        Diagnostic::factory()->create([
            'description'=>'hernia'
        ]);
        User::factory()->create([
            'name' => 'agustín',
            'lastname'=>'basterrica',
            'dob'=>'1986/09/01',
            'dni'=>'32378366',
            'role_id'=>1,
            'password'=>'sprinter413',
            'email' => 'agustinbasterrica@hotmail.com',
        ]);
         User::factory()->create([
            'name' => 'enzo',
            'lastname'=>'rottino',
            'dob'=>'1975/01/12',
            'dni'=>'27090163',
            'role_id'=>2,
            'password'=>'sprinter413',
            'email' => 'enzorottino@hotmail.com',
        ]);
    }
}
