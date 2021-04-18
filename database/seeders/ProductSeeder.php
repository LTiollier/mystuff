<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Vélo électrique',
                'folder_id' => null,
            ],
            [
                'name' => 'Couteaux japonais',
                'folder_id' => 2,
            ],
            [
                'name' => 'Clavier Logitech sans fil',
                'folder_id' => 3,
            ],
            [
                'name' => 'Souris Logitech sans fil',
                'folder_id' => 3,
            ],
            [
                'name' => 'Souris Logitech Ergo',
                'folder_id' => 4,
            ],
        ]);
    }
}
