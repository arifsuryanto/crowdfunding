<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'Arif',
                'email' => 'Arif@surya.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 'aef4e47f-e7b9-4d94-8477-ac4ea63fe47d',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'aripp',
                'email' => 'aripp@mail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('ola'),
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 'e1964458-42dd-421e-9b30-c273213fa641',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'surya',
                'email' => 'suryanto@mail.com',
                'email_verified_at' => null,
                'password' => Hash::make('ola'),
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 'e1964458-42dd-421e-9b30-c273213fa641',
            ],
        ]);
    }
}
