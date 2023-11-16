<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('comment');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
