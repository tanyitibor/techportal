<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->string('id', 6)->primary();
            $table->unsignedInteger('author_id');
            $table->string('title');
            $table->string('slug');
            $table->string('prev_text');
            $table->string('prev_img');
            $table->string('prev_img_thumb');
            $table->text('body');
            $table->boolean('is_published');
            $table->timestamp('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
