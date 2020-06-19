<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $category = array(
	array(
		"category_id" => 1,
		"name" => "Action",
	),
	array(
		"category_id" => 2,
		"name" => "Animation",
	),
	array(
		"category_id" => 3,
		"name" => "Children",
	),
	array(
		"category_id" => 4,
		"name" => "Classics",
	),
	array(
		"category_id" => 5,
		"name" => "Comedy",
	),
	array(
		"category_id" => 6,
		"name" => "Documentary",
	),
	array(
		"category_id" => 7,
		"name" => "Drama",
	),
	array(
		"category_id" => 8,
		"name" => "Family",
	),
	array(
		"category_id" => 9,
		"name" => "Foreign",
	),
	array(
		"category_id" => 10,
		"name" => "Games",
	),
	array(
		"category_id" => 11,
		"name" => "Horror",
	),
	array(
		"category_id" => 12,
		"name" => "Music",
	),
	array(
		"category_id" => 13,
		"name" => "New",
	),
	array(
		"category_id" => 14,
		"name" => "Sci-Fi",
	),
	array(
		"category_id" => 15,
		"name" => "Sports",
	),
	array(
		"category_id" => 16,
		"name" => "Travel",
	),
);


    DB::table('category')->delete();
    DB::table('category')->insert($category);  
    }
}
