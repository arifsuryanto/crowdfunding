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
                'password' => Hash::make('123456'),
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'aripp',
                'email' => 'aripp@mail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('halohalo'),
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'surya',
                'email' => 'suryanto@mail.com',
                'email_verified_at' => null,
                'password' => Hash::make('hihihihi'),
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
