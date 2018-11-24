<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributesToHuisarts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('huisarts', function($table) {
        $table->string('praktijknaam');
        $table->string('adres');
        $table->string('postcode');
        $table->string('telefoon');
        $table->string('email');
        $table->string('contactpersoon');
        $table->string('telefoon_contactpersoon');
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
