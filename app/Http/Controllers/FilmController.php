<?php

namespace App\Http\Controllers;

use App\Film;
use App\Language;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filmovi= Film::all();
        return view('films.index', compact('filmovi'));
    }
     /**
     * prikazi filmove na originalnom jeziku
     * @return \Illuminate\Http\Response
     */   
        public function listbyoriglang(Language $lang)
    {
         /*$lang=new Language
[!] Aliasing 'Language' to 'App\Language' for this Tinker session.
=> App\Language {#4048}
>>> $lang->find(1)->films()*/
            
        //$filmovi= Film::all();
       // dd($lang);
        $filmovi=$lang->films()->get();
       // dd($filmovi);
        $subtitle="Lista filmova na originalnom jeziku ";
        return view('films.listbylang', compact('filmovi','lang','subtitle'));
    }
     /**
     * prikazi filmove prevedene na neki jezik
     * @return \Illuminate\Http\Response
     */   
        public function listbytranslang(Language $lang)
    {
        $filmovi=$lang->films_prevedeni()->get();
        $subtitle="Lista filmova prevedenih na jezik ";
        return view('films.listbylang', compact('filmovi','lang','subtitle'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $lista_jezika= Language::all()->sortBy('name');
       return view('films.create',compact('lista_jezika'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Film $film )
    {
        /*
        dd($request);
         *  +request: Symfony\Component\HttpFoundation\ParameterBag {#44 ▼
    #parameters: array:13 [▼
      "_token" => "dgg5p2eoevosp2WsmfF8vFGZG9FiNzKhyGPVkAs5"
      "title<" => "we"
      "description" => "fdd"
      "release_year" => "1950"
      "language_id" => "5"
      "original_language_id" => "2"
      "rental_duration" => "1"
      "rental_rate" => "0.00"
      "length" => "0.00"
      "replacement_cost" => "0.00"
      "rating" => "PG-13"
      "special_features" => array:2 [▼
        0 => "Commentaries"
        1 => "Behind the Scenes"
      ]
      "dodaj_film_sbm" => "Dodaj novi film"
    ]
  }
         * 
         */
     $validatedData = $request->validate([
        'title'  => 'required|string|max:128|alpha',
        'release_year'   => 'required|numeric|between:1950,2019',
        'language_id'   => 'required|numeric|between:1,6',         
    ]);
     $film->title = $request->input('title');
     $film->description = $request->input('description');
     $film->release_year = $request->input('release_year');
     $film->language_id = $request->input('language_id');
     $film->original_language_id = $request->input('original_language_id');
     $film->rental_duration = $request->input('rental_duration');
     $film->rental_rate = $request->input('rental_rate');
     $film->length = $request->input('length');
     $film->replacement_cost = $request->input('replacement_cost');
     $film->rating = $request->input('rating');     
     
     // Example #1 implode() example
     // $array = array('lastname', 'email', 'phone');
     // $comma_separated = implode(",", $array);
     // echo $comma_separated; // lastname,email,phone
     $film->special_features =  $tags = implode(',', $request->input('special_features'));  
     
     
     $film->save(); // sacuvaj u bazu podataka

     return redirect()->route('films.index')->with('success', 'Film added!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
         return view('films.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film obrisan!');
    }
}
