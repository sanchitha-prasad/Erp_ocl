<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenderfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venderfiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vender_id')->unsigned()->nullable();
            $table->text('file');
            $table->timestamps();
            $table->foreign('vender_id')->references('id')->on('venders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venderfiles');
    }
}
