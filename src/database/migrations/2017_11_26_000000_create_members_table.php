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
            $table->text('teaser')->nullable();
            $table->string('education')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->json('tags')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('xing')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('web')->nullable();
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
