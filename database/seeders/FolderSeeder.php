<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Root Folders
         */
        DB::table('folders')->insert([
            [
                'id' => 1,
                'name' => 'Bureau',
                'user_id' => 1,
                'folder_id' => null,
            ],
            [
                'id' => 2,
                'name' => 'Cuisine',
                'user_id' => 1,
                'folder_id' => null,
            ],
            [
                'id' => 3,
                'name' => 'Gaming',
                'user_id' => 1,
                'folder_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Boulot',
                'user_id' => 1,
                'folder_id' => 1,
            ],
        ]);
    }
}
