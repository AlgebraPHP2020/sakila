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
    
    protected $fillable=['name'];
    
    
    public function filmovi()
    {
        //return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
        return $this->belongsToMany('App\Film','film_category','category_id','film_id');  
    }
    public function ikonica(){
    switch ($this->name) {
        case 'Music':  $icon= '<i class="fas fa-music"></i>'; break;
        case 'Games':  $icon= '<i class="fas fa-gamepad"></i>'; break;
        case 'Comedy':  $icon= '<i class="fas fa-theater-masks"></i>'; break;
        case 'Action':  $icon= '<i class="fas fa-bomb"></i>'; break;
        case 'Drama':  $icon= '<i class="fas fa-house-damage"></i>'; break;
        case 'Documentary':  $icon= '<i class="fas fa-book"></i>'; break;
        case 'Horror':  $icon= '<i class="fas fa-biohazard"></i>'; break;
        case 'Sci-Fi':  $icon= '<i class="fas fa-robot"></i>'; break;
                                                        
        default:$icon=$this->name; break;
    }
    return $icon;
}
}
