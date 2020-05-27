<?php
namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    public function index() {
        //return "hello";
      // $predmets = Predmet::all();
   $glumci = Actor::paginate(15);
    //dd($predmets);
//         echo '<ul>';
//         foreach ($predmets as $key => $p) {
//          echo '<li>'.$p->nazpred.'</li>';
//         }
//         echo '</ul>';
    return view('actor.index', compact('glumci'));
    }
}
