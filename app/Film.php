<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected  $primaryKey='film_id';
     /**
     * Dohvati ORIGINALNI jezik iz ovog modela
     */
    public function lang_orig()
    {
                              //poveznica s modelom, kljuc od stranog modela, moj kljuc, 
        //return $this->hasOne('App\Language','language_id','original_language_id' ); // primjer 1:1 relacije
        return $this->belongsTo('App\Language','original_language_id','language_id' ); // primjer 1:n relacije
    }
         /**
     * Dohvati PREVEDENI jezik iz ovog modela
     */
    public function lang_trans()
    {
                              //poveznica s modelom, kljuc od stranog modela, moj kljuc, 
       // return $this->hasOne('App\Language','language_id','language_id' );
        return $this->belongsTo('App\Language','language_id','language_id' ); // primjer 1:n relacije
    }
    public function actors()
    {
        //return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
        return $this->belongsToMany('App\Actor','film_actor','film_id','actor_id');
        
    }
        public function zanr()
    {
        //return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
        return $this->belongsToMany('App\Category','film_category','film_id','category_id');
        
    }
}
