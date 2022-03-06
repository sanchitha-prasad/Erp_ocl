<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('b_name');
            $table->string('b_address');
            $table->string('bt_Number');
            $table->string('br_Number');
            $table->string('p_name');
            $table->string('r_address');
            $table->string('n_f_y_business');
            $table->string('nic');
            $table->string('bank');
            $table->string('branch');
            $table->string('a_c_number');
            $table->string('signature1');
            $table->string('signature2');
            $table->string('user');
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
        Schema::dropIfExists('suppliers');
    }
}
