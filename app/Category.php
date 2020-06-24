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
    
    public function filmovi()
    {
        //return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
        return $this->belongsToMany('App\Film','film_category','category_id','film_id');  
    }
}
