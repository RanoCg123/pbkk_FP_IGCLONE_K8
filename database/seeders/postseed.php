<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class postseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i < 6; $i++)
        {

                        DB::table('posts')
            ->insert([
                'user'=>Str::random(10),
                'image'=>Str::random(10),
                'title'=>Str::random(10),
                'caption'=>Str::random(15)


            ]);
        }
    }
}
