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
    public function up() //php artisan migrate
    {
        //TODO vrati na pravu tablicu actors
        Schema::create('actors', function (Blueprint $table) {
            //$table->id();
            //TODO provjeri kreira int(10) a u originalu je smallint(5)
            //$table->increments('actor_id'); // postavi primarni kljuc i auto_increments (PK & A_I)
            $table->smallIncrements('actor_id'); // postavi primarni kljuc i auto_increments (PK & A_I)
            
            $table->string('first_name', 45);
            $table->string('last_name', 45)->index(); // dodajemo index
            $table->timestamp('last_update');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()  //php artisan migrate:rollback
    {
        Schema::dropIfExists('actors');
    }
}
