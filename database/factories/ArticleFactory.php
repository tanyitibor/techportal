<?php
use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    $sentence = $faker->sentence(4);
    $body = file_get_contents("https://jaspervdj.be/lorem-markdownum/markdown.txt");
    $isPublished = rand(1, 5) === 5 ? 0 : 1;

    return [
        'author_id'     => rand(2, 3),
        'title'         => $sentence,
        'prev_text'     => mb_substr($faker->paragraph(), 0, 255),
        'prev_img'      => 'images/placeholder.png',
        'prev_img_thumb'=> 'images/thumbs/placeholder.png',
        'body'          => mb_substr($body, 0, 10000),
        'slug'          => str_slug($sentence),
        'is_published'  => $isPublished,
        'published_at'  => $isPublished ? date("Y-m-d H:i:s") : null,
    ];
});
