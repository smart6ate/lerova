<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('type')->default(config('lerova.pages.type'));
            $table->string('language')->default(config('lerova.pages.language'));

            $table->string('title')->unique();
            $table->string('description')->default(config('lerova.pages.description'));

            $table->json('keywords')->nullable();
            $table->string('image');
            $table->boolean('published')->default(false);

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
