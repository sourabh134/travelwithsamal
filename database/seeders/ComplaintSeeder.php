<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Complaint;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Complaint::create([
            'user_id'=>'1',
            'doctor_id'=>'1',
            'complaint_msg'=>'Dr.Robb have very bad idea about ortho',
            'status'=>'1',
        ]);
    }
}
