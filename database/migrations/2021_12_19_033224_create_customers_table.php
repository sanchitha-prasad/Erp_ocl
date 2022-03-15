<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('cus_id');
            $table->string('cus_name');
            $table->string('prospect');
            $table->string('active');
            $table->string('ac_number');
            $table->string('b_address');
            $table->string('city');
            $table->string('st');
            $table->string('zip');
            $table->string('country');
            $table->string('sellsTax');
            $table->string('c_type');
            $table->text('website');
            $table->string('co_name');
            $table->string('company');
            $table->string('job');
            $table->string('t1');
            $table->string('t2');
            $table->string('fax');
            $table->string('email');
            $table->string('gender');
            $table->string('address');
            $table->text('note');
            $table->string('default');
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
        Schema::dropIfExists('customers');
    }
}
