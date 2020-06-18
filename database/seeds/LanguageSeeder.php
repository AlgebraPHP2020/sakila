<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = array(
	array(
		"language_id" => 1,
		"name" => "English",
		"last_update" => "2006-02-15 05:02:19",
	),
	array(
		"language_id" => 2,
		"name" => "Italian",
		"last_update" => "2006-02-15 05:02:19",
	),
	array(
		"language_id" => 3,
		"name" => "Japanese",
		"last_update" => "2006-02-15 05:02:19",
	),
	array(
		"language_id" => 4,
		"name" => "Mandarin",
		"last_update" => "2006-02-15 05:02:19",
	),
	array(
		"language_id" => 5,
		"name" => "French",
		"last_update" => "2006-02-15 05:02:19",
	),
	array(
		"language_id" => 6,
		"name" => "German",
		"last_update" => "2006-02-15 05:02:19",
	),
);

           
        DB::table('languages')->delete();
        DB::table('languages')->insert($language);
    }
}
