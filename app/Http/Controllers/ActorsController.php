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
     /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Adresa $adresa
     *
     * @return Response
     */
    public function show(Actor $actor)
    {
//http://sakila.test/actors/7
        /*
      #attributes: array:4 [▼
    "actor_id" => 7
    "first_name" => "GRACE"
    "last_name" => "MOSTEL"
    "last_update" => "2006-02-15 04:34:33"
  ]
         */

        return view('actor.show', ['actor' => $actor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Actor $actor
     *
     * @return Response
     */
    public function edit(Actor $actor)
    {
        return view('actor.edit', ['actor' => $actor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Actor $actor
     *
     * @return Response
     */
    public function update(Request $request, Actor $actor)
    {
        // lokalizacija koja radi samo za ovu rutu,
        // za globalnu lokalizaciju editiraj config/app.php -> 'locale'
        \Illuminate\Support\Facades\App::setLocale('hr');
        //TODO Validacija na nacin Laravel 7
     $validatedData = $request->validate([
        'actor_id'    => 'required|numeric',
        'first_name'  => 'required|string|max:45|alpha',
        'last_name'   => 'required|string|max:45|alpha',
    ]);
     $actor->first_name = $request->input('first_name');
     $actor->last_name = $request->input('last_name');
     $actor->save(); // sacuvaj u bazu podataka
            // redirect
           // Session::flash('message', 'Uspješno izmjenjeni podaci glumca!');

            return redirect()->route('actors.index');
     //$validated = $request->validated();
     
     
//        $validator = Validator::make($request->all(), [
//              'trgovina_id' => 'required|numeric',
//              'country'     => 'required|string|max:191',
//              'city'        => 'required|string|max:191',
//              'pbr'         => 'required|string|max:191',
//              'street'      => 'required|string|max:191',
//        ]);
//        if ($validator->fails()) {
//            Session::flash('error', 'Greška, molim ispravno popuniti polja!');
//
//            return redirect('adresa/'.$trgovine->id.'/edit')
//                    ->withErrors($validator)
//                    ->withInput();
//        } 
     /*if (!$request->validated()) {
            Session::flash('error', 'Greška, molim ispravno popuniti polja!');

            return redirect('actors/'.$actor->actor_id.'/edit')
                    ->withErrors($validatedData)
                    ->withInput();
     }
        else {
            // store
            $adresa->trgovina_id = $request->input('trgovina_id');
            $adresa->country = $request->input('country');
            $adresa->city = $request->input('city');
            $adresa->pbr = $request->input('pbr');
            $adresa->phone = $request->input('phone');

            // ako postoji slika uploadaj ju
            try {
                $imageExtension = $request->slika->getClientOriginalExtension();  // nastavak
                $imageName = 'adresa-'.$adresa->id.'-'.now()->format('Y-m-d').'.'.$imageExtension; // ime slike
                $adresa->slika = $imageName;  // ime slike u bazi
                $request->slika->move(public_path(), $imageName); // kopiraj u /public
            } catch (Exception $e) {
                dd($e);
            }

            $adresa->save();
            // redirect
            Session::flash('message', 'Uspješno izmjenjena adresa!');

            return redirect()->route('adresa.index');
        }
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Adresa $adresa
     *
     * @return Response
     */
    public function destroy(Adresa $adresa)
    {
        //
    }
}
