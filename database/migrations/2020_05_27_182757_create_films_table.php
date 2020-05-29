<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/*
 CREATE TABLE `film` (
	`film_id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(128) NOT NULL COLLATE 'utf8mb4_general_ci',
	`description` TEXT NULL COLLATE 'utf8mb4_general_ci',
	`release_year` YEAR NULL,
	`language_id` TINYINT(3) UNSIGNED NOT NULL,
	`original_language_id` TINYINT(3) UNSIGNED NULL,
	`rental_duration` TINYINT(3) UNSIGNED NOT NULL DEFAULT '3',
	`rental_rate` DECIMAL(4,2) NOT NULL DEFAULT '4.99',
	`length` SMALLINT(5) UNSIGNED NULL,
	`replacement_cost` DECIMAL(5,2) NOT NULL DEFAULT '19.99',
	`rating` ENUM('G','PG','PG-13','R','NC-17') NULL DEFAULT G COLLATE 'utf8mb4_general_ci',
	`special_features` SET('Trailers','Commentaries','Deleted Scenes','Behind the Scenes') NULL COLLATE 'utf8mb4_general_ci',
	`last_update` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	PRIMARY KEY (`film_id`) USING BTREE,
	INDEX `idx_title` (`title`) USING BTREE,
	INDEX `idx_fk_language_id` (`language_id`) USING BTREE,
	INDEX `idx_fk_original_language_id` (`original_language_id`) USING BTREE,
	CONSTRAINT `fk_film_language` FOREIGN KEY (`language_id`) REFERENCES `sakila`.`language` (`language_id`) ON UPDATE CASCADE ON DELETE RESTRICT,
	CONSTRAINT `fk_film_language_original` FOREIGN KEY (`original_language_id`) REFERENCES `sakila`.`language` (`language_id`) ON UPDATE CASCADE ON DELETE RESTRICT
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1001;

 */
class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->smallIncrements('film_id');
            $table->string("title",128)->index('idx_title');
            $table->text("description")->nullable();
            $table->year("release_year");
            // language_id je u bazi smallint(3)
            $table->tinyInteger("language_id")->index()->unsigned();
            
            //`original_language_id` TINYINT(3) UNSIGNED NULL,
            $table->tinyInteger("original_language_id")->index()->nullable()->unsigned();
            
            $table->tinyInteger("rental_duration")->unsigned();  
            
            //`rental_rate` DECIMAL(4,2) NOT NULL DEFAULT '4.99',
            $table->decimal("rental_rate", 4, 2)->default('4.99');
            
            //`length` SMALLINT(5) UNSIGNED NULL,
            $table->smallInteger('length')->nullable()->unsigned();
            
            //`replacement_cost` DECIMAL(5,2) NOT NULL DEFAULT '19.99',
            $table->decimal("replacement_cost", 5, 2)->default('19.99');
            
            //`rating` ENUM('G','PG','PG-13','R','NC-17') NULL DEFAULT G COLLATE 'utf8mb4_general_ci',
            $table->enum("rating", ['G','PG','PG-13','R','NC-17'])->nullable()->default('G')->collation('utf8mb4_general_ci');
            
            //`special_features` SET('Trailers','Commentaries','Deleted Scenes','Behind the Scenes') NULL COLLATE 'utf8mb4_general_ci',
	    $table->set('special_features',['Trailers','Commentaries','Deleted Scenes','Behind the Scenes'])->nullable()->collation('utf8mb4_general_ci');

// Mozemo i ->useCurrent(); ali onda nem nece raditi update kolumne
//`last_update` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),            
//$table->timestamp('last_update')->useCurrent();
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
        Schema::dropIfExists('films');
    }
}
