<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_spaces', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->double('price')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('gov_area')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('logitude')->nullable();
            $table->enum('media_type', ['image', 'audio_image', 'video'])->nullable();
            $table->string('file')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('ad_spaces');
    }
}
