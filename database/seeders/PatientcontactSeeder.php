<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patientcontact;

class PatientcontactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patientcontact::create([
            'name'=>'Ram',
            'email'=>'mobappssolutions156@gmail.com',
            'phone'=>'8090751172',
            'message'=>'Hello Sir, I need a doctor for my eye. Please help out as soon as possible.'
        ]);
    }
}
