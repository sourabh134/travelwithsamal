<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'image'=>'abc',
            'name'=>'Robb',
            'email'=>'mobappssolutions156@gmail.com',
            'password'=>Hash::make('123456'),
            'address'=>'Noida Sec-59',
            'remember_token'=>'abc123',
            'status'=>'1',
        ]);
    }
}
