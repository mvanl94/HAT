<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeNewEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('naam');
            $table->string('adres');
            $table->string('postcode');
            $table->string('email');
            $table->string('telefoon');
            $table->integer('ervaring');
            $table->integer('schaal');
            $table->integer('salarisnummer');
            $table->string('beschikbaarheid');
            $table->string('ingepland');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
