<?php
/*
 * $ php artisan make:model Category -a
Model created successfully.
Factory created successfully.
Created Migration: 2020_06_18_201208_create_categories_table
Seeder created successfully.
Controller created successfully.

 * 
 */


namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     /**
     * Tablica u bazi za model Actor.
     *
     * @var string
     */
    protected $table = 'category';
    
     /**
     * Primarni kljuc.
     *
     * @var string
     */
    protected $primaryKey = 'category_id';
}
