<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ColorSeeder extends Seeder
{
    public function run()
    {
        DB::table('colors')->insert([
            ['name' => 'Red', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Blue', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Green', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
