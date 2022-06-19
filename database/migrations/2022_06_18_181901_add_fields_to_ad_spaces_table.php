<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToAdSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ad_spaces', function (Blueprint $table) {
            $table->string('dimension')->after('address')->nullable();
            $table->string('hight')->after('dimension')->nullable();
            $table->string('lightning')->after('hight')->nullable();
            $table->string('brand')->after('lightning')->nullable();
            $table->string('side_road')->after('brand')->nullable();
            $table->string('medium')->after('side_road')->nullable();
            $table->string('orientation')->after('medium')->nullable();
            $table->string('clutter')->after('orientation')->nullable();
            $table->string('runup')->after('clutter')->nullable();
            $table->string('faces')->after('runup')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ad_spaces', function (Blueprint $table) {
            $table->dropColumn('dimension');
            $table->dropColumn('hight');
            $table->dropColumn('lightning');
            $table->dropColumn('brand');
            $table->dropColumn('side_road');
            $table->dropColumn('medium');
            $table->dropColumn('orientation');
            $table->dropColumn('clutter');
            $table->dropColumn('runup');
            $table->dropColumn('faces');
        });
    }
}
