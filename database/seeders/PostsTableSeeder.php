<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('posts')->insert([
            [
                'content' => 'Premier post',
                'likes' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Deuxième post',
                'likes' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Troisième post',
                'likes' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
