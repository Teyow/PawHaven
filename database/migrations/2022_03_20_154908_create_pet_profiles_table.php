<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pet_id');
            $table->string('size');
            $table->string('color');
            $table->string('personality');
            $table->string('healthInfo');
            $table->string('about');
            $table->string('pet_image');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pet_id')
                ->references('id')
                ->on('pets')
                ->onDelete('cascade')
                ->onUpdate(('cascade'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet_profiles');
    }
}
