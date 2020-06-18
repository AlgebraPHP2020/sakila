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
      
    /**
     * Dohvati sve filmove ciji je ORIGINALNI jezik kao iz ovog modela
     */
    public function films()
    {
                              //poveznica s modelom, kljuc od stranog modela, moj kljuc, 
        return $this->hasMany('App\Film','original_language_id','language_id' );
    }
       
    /**
     * Dohvati sve filmove ciji je PRIJEVOD jezika kao iz ovog modela
     * npr, ako je model jezika madjarski dobivamo sve filmove koji su prevedeni na madjarski
     */
    public function films_prevedeni()
    {
        return $this->hasMany('App\Film','language_id','language_id' );
    }
    
}
