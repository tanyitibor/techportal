<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    private $tags = [
        'Mobile', 'Computers', 'Gaming', 'Gadgets', 'Enterprise',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = array_map(function ($tag) {
            return [
                'name'  => $tag,
                'slug'  => strtolower($tag),
            ];
        }, $this->tags);

        DB::table('tags')->truncate();
        DB::table('tags')->insert($tags);
    }
}
