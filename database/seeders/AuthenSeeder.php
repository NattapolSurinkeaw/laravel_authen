<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
class AuthenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'nattapol',
            'email' => 'nattapol.surinkeaw@gmail.com',
            'password' => bcrypt(123456),

        ];

        User::create($user);

        $admin = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(1234567),
            'login_at' => date('Y-m-d H:i:s'),
        ];

        Admin::create($admin);
    }
}
