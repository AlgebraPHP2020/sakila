<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //TODO vrati na pravu tablicu actors
        Schema::create('actors', function (Blueprint $table) {
            //$table->id();
            $table->increments('actor_id'); // postavi primarni kljuc i auto_increments (PK & A_I)
            $table->string('first_name', 45);
            $table->string('last_name', 45);
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
        Schema::dropIfExists('actors');
    }
}
