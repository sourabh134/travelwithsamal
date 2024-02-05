<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->where('id', 1)->update([
            'name' => 'Gearz Admin',
            'email' => 'admin123@gmail.com',
            'phone' => '9879879879',
            'address' => 'Noida Sector-59',
            'username' => 'GearzAdmin',
            'password' => md5('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'userType' => 1,
        ]);
    }
}
