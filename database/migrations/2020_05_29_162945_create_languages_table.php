<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *CREATE TABLE `language` (
	`language_id` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` CHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`last_update` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	PRIMARY KEY (`language_id`) USING BTREE
)
     * 
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->tinyInteger('language_id')->unsigned()->autoIncrement(); // US AI PK
            $table->char('name', 20)->collation('utf8mb4_general_ci');
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('languages');
    }
}
