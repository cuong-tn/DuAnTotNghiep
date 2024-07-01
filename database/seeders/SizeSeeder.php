<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            ['name' => 'Small'],
            ['name' => 'Medium'],
            ['name' => 'Large'],
            // Thêm các size khác tùy theo nhu cầu
        ];

        Size::insert($sizes);
    }
}
