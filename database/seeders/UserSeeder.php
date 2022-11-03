<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'nama' => 'Admin Kebanan',
            'email' => 'admin@kebanan.com',
            'password' => Hash::make('admin.kebanan'),
        ]);
    }
}
