<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venders', function (Blueprint $table) {
            $table->id();
            $table->string('v_id');
            $table->string('v_name');
            $table->string('active');
            $table->string('contact');
            $table->string('ac_number');
            $table->string('m_address');
            $table->string('city');
            $table->string('st');
            $table->string('zip');
            $table->string('country');
            $table->string('v_type');
            $table->text('website');
            $table->string('onet');
            $table->string('e_account');
            $table->string('t1');
            $table->string('t2');
            $table->string('fax');
            $table->string('email');
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
        Schema::dropIfExists('venders');
    }
}
