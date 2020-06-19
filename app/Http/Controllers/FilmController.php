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
    public function store(Request $request)
    {
        //
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
