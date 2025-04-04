<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Treatment;
use Illuminate\Database\Seeder;
use App\Models\HealthAssessment;

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
            'email' => 's21010795',
            'password' => bcrypt('12345678'),
            'role' => 'doctor',
            'birthdate' => '1990-01-01',
            'sex' => 'male',
            'course' => 'BSIT',
            'year' => '3rd Year',
            'section' => 'A',
            'contact_no' => '09123456789',
            'emergency_contact' => '09123456789',
            'address' => '123 Main St, City, Country',
        ]);

        User::create([
            'firstname' => 'China',
            'middlename' => 'T.',
            'lastname' => 'Bea',
            'email' => 's21010791',
            'password' => bcrypt('12345678'),
            'role' => 'student',
            'birthdate' => '2000-02-02',
            'sex' => 'female',
            'course' => 'BSIT',
            'year' => '2nd Year',
            'section' => 'B',
            'contact_no' => '09876543210',
            'emergency_contact' => '09876543210',
            'address' => '456 Another St, City, Country',
        ]);
        User::create([
            'firstname' => 'Juan',
            'middlename' => 'Del',
            'lastname' => 'Matira',
            'email' => 's21010792',
            'password' => bcrypt('12345678'),
            'role' => 'student',
            'birthdate' => '2003-10-02',
            'sex' => 'male',
            'course' => 'BSIT',
            'year' => '2nd Year',
            'section' => 'B',
            'contact_no' => '09735426267',
            'emergency_contact' => '09578290134',
            'address' => '456 Another St, City, Country',
        ]);

        User::create([
            'firstname' => 'Maan',
            'middlename' => 'C',
            'lastname' => 'Dee',
            'email' => 'teacher1@gmail.com',
            'password' => bcrypt('s21010795'),
            'role' => 'teacher',
            'birthdate' => '2000-02-02',
            'sex' => 'female',
            'course' => 'BSIT',
            'year' => '2nd Year',
            'section' => 'B',
            'contact_no' => '09876543210',
            'emergency_contact' => '09876543210',
            'address' => '456 Another St, City, Country',
        ]);

        HealthAssessment::create([
            'user_id' => 2,
            'medical_history' => 'Asthma',
            'height' => '5ft 8in',
            'weight' => '150 lbs',
            'blood_pressure' => '120.0',
            'heart_rate' => '72.0 BPM',
            'medical_conditions' => 'Asthma',
            'allergies' => 'peanuts',
            'symptoms' => 'Frequent shortness of breath, occasional chest tightness',
        ]);

        Treatment::create([
            'user_id' => 1,
            'health_assessment_id' => 1,
            'medical_id' => 1,
            'interpretation_comments' => 'All tests are within normal limits.',
            'recommendations' => 'Continue regular exercise and maintain a balanced diet.',
            'prescriptions' => 'Some prescriptions here...',
            'result_summary' => 'Overall health is good, minor concerns with cholesterol levels.',
        ]);

        Treatment::create([
            'user_id' => 2, // Assuming user with ID 2 exists
            'health_assessment_id' => 1, // Assuming health assessment with ID 1 exists
            'medical_id' => 1,
            'interpretation_comments' => 'Elevated blood pressure noted.',
            'recommendations' => 'Monitor blood pressure and consider dietary changes.',
            'prescriptions' => 'Some prescriptions here...',
            'result_summary' => 'Health shows some concerns, specifically with blood pressure.',
        ]);
    }
}
