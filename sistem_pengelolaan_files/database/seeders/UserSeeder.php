<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin Aplikasi',
            'email' => 'admin_aplikasi@example.com',
            'password' => Hash::make('123'),
            'is_super_admin' => True,
            'divisi_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
