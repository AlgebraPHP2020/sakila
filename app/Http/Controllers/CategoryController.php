<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zanrovi= Category::all();
        return view('zanrovi.index', compact('zanrovi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     *GET|HEAD  | zanrovi/{zanrovi}      | zanrovi.show    | App\Http\Controllers\CategoryController@show
     * 
     * @param  \App\Category  $zanrovi
     * @return \Illuminate\Http\Response
     */
    public function show(Category $zanrovi) // saljem varijablu zanrovi
    {   
        $lista_filmova_odabranog_zanra=  $zanrovi->filmovi()->get();
       
       // Ovo dolje je primjer direktnog poziva, --radi bez problema 
       //  $c2=Category::find(6);
       //  $lista_filmova_odabranog_zanra=$c2->filmovi()->take(2)->get();
        return view('zanrovi.show', compact('lista_filmova_odabranog_zanra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
