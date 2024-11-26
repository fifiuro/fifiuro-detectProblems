<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => Str::uuid(),
                'name' => 'Admin',
                'last_name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@correo.com',
                'type' => 'admin',
                'password' => '$2y$12$/cl0p3vPCwg87t41FpB3mevZe86i2oUralj4uMkR6J4N66E7f.ioq',
            ]
        ];

        // Inserción nasiva
        DB::table('users')->insert($users);
    }
}
