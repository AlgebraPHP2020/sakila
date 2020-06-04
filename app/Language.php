<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
         /**
     * Tablica u bazi za model Actor.
     *
     * @var string
     */
    protected $table = 'languages'; // ovo je bespotrebnoo jer je ime po defaultu model+s
    
     /**
     * Primarni kljuc.
     *
     * @var string
     */
    protected $primaryKey = 'language_id';
    
}
