<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->text('description');
            $table->string('author');
            $table->string('image');
            $table->string('content_type');
            $table->enum('status',[0,1])->default(0);
            $table->enum('recent',[0,1])->default(0);
            $table->enum('trending',[0,1])->default(0);
            $table->enum('most_popular',[0,1])->default(0);
            $table->enum('published',[0,1])->default(0);
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
