<?php

use Illuminate\Database\Seeder;

class MenuTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuTags = array_map(function ($id) {
            return [
                'tag_id' => $id,
            ];
        }, range(1, 5));

        DB::table('menu_tags')->insert($menuTags);
    }
}
