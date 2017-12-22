<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {

            $table->increments('id');
            $table->uuid('uuid')->unique()->index();
            $table->unsignedInteger('page_id');

            $table->unsignedInteger('author_id');

            $table->string('type');

            $table->string('language')->default(config('lerova.core.blog.language'));

            $table->string('title');

            $table->text('teaser')->nullable();
            $table->longText('body')->nullable();

            $table->longText('url')->nullable();
            $table->dateTime('time')->nullable();

            $table->json('tags')->nullable();
            $table->string('image');
            $table->json('image_meta')->nullable();

            $table->boolean('published')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::disableForeignKeyConstraints('blogs');
        Schema::dropIfExists('blogs');
    }
}
