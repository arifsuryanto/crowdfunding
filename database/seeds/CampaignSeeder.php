<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaigns')->insert([
            [
                'id' => Str::uuid(),
                'title' => 'Wrecked Home',
                'description' => 'Donasi untuk bedah rumah roboh',
                'image' => '/photos/1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Yogyakarta',
                'required' => '1000000',
                'collected' => '30000',
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Kidney Surgery',
                'description' => 'Donasi untuk operasi ginjal',
                'image' => '/photos/2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Sleman',
                'required' => '10000000',
                'collected' => '300000',
            ],            [
                'id' => Str::uuid(),
                'title' => 'Disability Donation',
                'description' => 'Donasi untuk atlet difabel',
                'image' => '/photos/3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Bantul',
                'required' => '4000000',
                'collected' => '3600000',
            ],            [
                'id' => Str::uuid(),
                'title' => 'Burned House',
                'description' => 'Donasi untuk kebakaran komplex',
                'image' => '/photos/4.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Kota Yogyakarta',
                'required' => '10000000',
                'collected' => '3000000',
            ],            [
                'id' => Str::uuid(),
                'title' => 'Homeless Donation',
                'description' => 'Donasi untuk para pengemis',
                'image' => '/photos/5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Kulon Progo',
                'required' => '10000000',
                'collected' => '3900000',
            ],            [
                'id' => Str::uuid(),
                'title' => 'Poverty Donation',
                'description' => 'Donasi untuk rakyat miskin',
                'image' => '/photos/6.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Gunung Kidul',
                'required' => '9000000',
                'collected' => '8000000',
            ],            [
                'id' => Str::uuid(),
                'title' => 'Covid APD Donation',
                'description' => 'Donasi untuk pengadaan apd',
                'image' => '/photos/7.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Yogyakarta',
                'required' => '8000000',
                'collected' => '7000000',
            ],            [
                'id' => Str::uuid(),
                'title' => 'Old man street vendor',
                'description' => 'Donasi untuk pedagang kaki lima',
                'image' => '/photos/8.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Yogyakarta',
                'required' => '1000000',
                'collected' => '30000',
            ],            [
                'id' => Str::uuid(),
                'title' => 'Street Feeding Cat',
                'description' => 'Donasi untuk memberi makan kucing jalanan',
                'image' => '/photos/9.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Yogyakarta',
                'required' => '1000000',
                'collected' => '550000',
            ],            [
                'id' => Str::uuid(),
                'title' => 'Street Feeding Cat 2 ',
                'description' => 'Donasi untuk memberi makan kucing jalanan',
                'image' => '/photos/10.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Bantul',
                'required' => '10000000',
                'collected' => '9000000',
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Beggar Donation',
                'description' => 'Donasi untuk pengemis',
                'image' => '/photos/11.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Yogyakarta',
                'required' => '9000000',
                'collected' => '7770000',
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Street Vendor Donation',
                'description' => 'Donasi untuk pengemis',
                'image' => '/photos/12.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Yogyakarta',
                'required' => '9000000',
                'collected' => '7770000',
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Orphanage Donations',
                'description' => 'Donasi untuk panti asuhan',
                'image' => '/photos/13.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Yogyakarta',
                'required' => '5555000',
                'collected' => '4000000',
            ],            [
                'id' => Str::uuid(),
                'title' => 'Orphanage Donations 2',
                'description' => 'Donasi untuk panti asuhan 2',
                'image' => '/photos/14.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Yogyakarta',
                'required' => '9000000',
                'collected' => '4000000',
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Fisherman DOnation',
                'description' => 'Donasi untuk nelayan',
                'image' => '/photos/15.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'address' => 'Yogyakarta',
                'required' => '1000000',
                'collected' => '30000',
            ]

        ]);
    }
}
