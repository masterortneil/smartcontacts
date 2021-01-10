<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            ['name' => 'Music'],
            ['name' => 'Travelling'],
            ['name' => 'Shopping'],
            ['name' => 'Bike Ridding']
        ];

        Interest::insert($data);
    }
}
