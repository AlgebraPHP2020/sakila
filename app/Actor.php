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
}
