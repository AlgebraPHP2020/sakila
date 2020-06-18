<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jezici = Language::all()->reverse(); //sve podatke iz tablice languages preko modela Language
        return view('languages.index ', compact('jezici'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'name'  => 'required|string|max:20|alpha',
    ]);
     $language = new Language;
     $language->name = $request->input('name');
     $language->save(); // sacuvaj u bazu podataka

     return redirect()->route('languages.index')->with('success', 'Novi jezik dodan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        return view('languages.show', ['jez' => $language]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
       return view('languages.edit', ['jez' => $language]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
            $validatedData = $request->validate([
        'language_id'    => 'required|numeric',
        'name'  => 'required|string|max:20|alpha',
    ]);
     $language->name = $request->input('name');
     $language->save(); // sacuvaj u bazu podataka

     return redirect()->route('languages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->route('languages.index')->with('success', 'Jezik obrisan!');
    }
}
