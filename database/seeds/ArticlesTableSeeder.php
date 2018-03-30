<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Article::class, 20)->create()
            ->each(function ($a) {
                DB::table('article_tags')->insert([
                    'article_id'    => $a->id,
                    'tag_id'        => rand(1, 5),
                ]);

                if (rand(1, 3) === 3) {
                    DB::table('featured')->insert([
                        'article_id' => $a->id
                    ]);
                }
            });
    }
}
