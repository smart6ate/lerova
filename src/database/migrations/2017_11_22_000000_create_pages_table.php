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

            $table->string('type')->default(config('lerova.core.pages.type'));
            $table->string('language')->default(config('lerova.core.pages.language'));

            $table->string('title')->unique();
            $table->string('description')->default(config('lerova.core.pages.description'));

            $table->json('keywords')->nullable();
            $table->string('image')->default(config('lerova.core.pages.image'));;
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
