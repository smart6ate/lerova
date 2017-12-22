<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('members', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('teaser')->nullable();
            $table->string('body')->nullable();
            $table->json('tags')->nullable();
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
        Schema::disableForeignKeyConstraints('members');
        Schema::dropIfExists('members');
    }
}
