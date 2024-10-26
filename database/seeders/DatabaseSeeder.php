<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        
        User::create([
            'firstname' => 'John',
            'middlename' => 'Az',
            'lastname' => 'Doe',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('s21010795'), // Use bcrypt for password hashing
            'role' => 'teacher',
            'birthdate' => '1990-01-01',
            'sex' => 'male',
            'year' => '3rd Year',
            'section' => 'A',
            'contact_no' => '09123456789',
            'emergency_contact' => '09123456789',
            'address' => '123 Main St, City, Country',
        ]);

        User::create([
            'firstname' => 'John',
            'middlename' => 'Del',
            'lastname' => 'Crus',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('s21010795'),
            'role' => 'student',
            'birthdate' => '2000-02-02',
            'sex' => 'female',
            'year' => '2nd Year',
            'section' => 'B',
            'contact_no' => '09876543210',
            'emergency_contact' => '09876543210',
            'address' => '456 Another St, City, Country',
        ]);
        





    }
}

