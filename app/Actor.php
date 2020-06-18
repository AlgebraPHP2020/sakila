<?php
// php artisan make:model Actor --migration

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
     /**
     * Tablica u bazi za model Actor.
     *
     * @var string
     */
    protected $table = 'actor';
    
     /**
     * Primarni kljuc.
     *
     * @var string
     */
    protected $primaryKey = 'actor_id';
    
     /**
     * U bazi su sva imena zapisana velikim slovima (uppercase)
     * Treba ih vratiti kao Prvo veliko slovo ostala mala
     *
     * @param  string  $value
     * @return string
     */
    public function getFirstNameAttribute($value) // first_name -> FirstName
    {
        return ucfirst(strtolower($value));
       // return ucfirst($value);  // ovo ne radi!
    }
    public function getLastNameAttribute($value) // last_name -> LastName
    {
        return ucfirst(strtolower($value));
    }
        public function films()
    {
        return $this->belongsToMany('App\Film','film_actor','actor_id','film_id');   
    }
}
