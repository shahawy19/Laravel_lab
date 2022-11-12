<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 50; $i++) { 
            DB::table('posts')->insert([
                'title' => Str::random(10),
                'description' => Str::random(10),
                'user_id' => rand(1,25),
                'created_at' => date("Y-m-d H:i:s") 
            ]);
       }
    }
    
}
