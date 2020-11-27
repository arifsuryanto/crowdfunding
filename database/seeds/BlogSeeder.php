<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'id' => Str::uuid(),
                'title' => 'Street Feeding Cat',
                'description' => 'Informasi tentang memberi makan kucing jalanan',
                'image' => '/photos/9.jpg',
                'created_at' => now(),
                'updated_at' => now(),

            ],            [
                'id' => Str::uuid(),
                'title' => 'Street Feeding Cat 2 ',
                'description' => 'Informasi tentang memberi makan kucing jalanan',
                'image' => '/photos/10.jpeg',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id' => Str::uuid(),
                'title' => 'Orphanage Donations',
                'description' => 'Informasi tentang donasi untuk panti asuhan',
                'image' => '/photos/13.jpg',
                'created_at' => now(),
                'updated_at' => now(),

            ],            [
                'id' => Str::uuid(),
                'title' => 'Orphanage Donations 2',
                'description' => 'Informasi tentang donasi untuk panti asuhan 2',
                'image' => '/photos/14.jpg',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id' => Str::uuid(),
                'title' => 'Fisherman DOnation',
                'description' => 'Informasi tentang Donasi untuk nelayan',
                'image' => '/photos/15.jpg',
                'created_at' => now(),
                'updated_at' => now(),

            ], [
                'id' => Str::uuid(),
                'title' => 'Wrecked Home',
                'description' => 'Informasi tentang Donasi untuk bedah rumah roboh',
                'image' => '/photos/1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Kidney Surgery',
                'description' => 'Informasi tentang Donasi untuk operasi ginjal',
                'image' => '/photos/2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],            [
                'id' => Str::uuid(),
                'title' => 'Disability Donation',
                'description' => 'Informasi tentang donasi untuk atlet difabel',
                'image' => '/photos/3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],            [
                'id' => Str::uuid(),
                'title' => 'Burned House',
                'description' => 'Informasi tentang donasi untuk kebakaran komplex',
                'image' => '/photos/4.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Homeless Donation',
                'description' => 'Informasi tentang donasi untuk para pengemis',
                'image' => '/photos/5.jpg',
                'created_at' => now(),
                'updated_at' => now(),

            ],            [
                'id' => Str::uuid(),
                'title' => 'Poverty Donation',
                'description' => 'Informasi tentang donasi untuk rakyat miskin',
                'image' => '/photos/6.jpg',
                'created_at' => now(),
                'updated_at' => now(),

            ],            [
                'id' => Str::uuid(),
                'title' => 'Covid APD Donation',
                'description' => 'Informasi tentang  pengadaan apd',
                'image' => '/photos/7.jpg',
                'created_at' => now(),
                'updated_at' => now(),

            ],            [
                'id' => Str::uuid(),
                'title' => 'Old man street vendor',
                'description' => 'Informasi tentang donasi untuk pedagang kaki lima',
                'image' => '/photos/8.jpg',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id' => Str::uuid(),
                'title' => 'Beggar Donation',
                'description' => 'Informasi tentang donasi untuk pengemis',
                'image' => '/photos/11.jpg',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id' => Str::uuid(),
                'title' => 'Street Vendor Donation',
                'description' => 'Informasi tentang donasi untuk pengemis',
                'image' => '/photos/12.jpg',
                'created_at' => now(),
                'updated_at' => now(),

            ]
        ]);
    }
}
