<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            ['name' => 'English'],
            ['name' => 'Afrikaans'],
            ['name' => 'Sepedi'],
            ['name' => 'Southern Ndebele'],
            ['name' => 'Swazi'],
            ['name' => 'Tsonga'],
            ['name' => 'Tswana'],
            ['name' => 'Venda'],
            ['name' => 'Xhosa'],
            ['name' => 'Zulu'],
        ];

        Language::insert($data);
    }
}
