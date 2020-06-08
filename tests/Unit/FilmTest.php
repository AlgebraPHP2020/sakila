<?php

namespace Tests\Unit;
use App\Film;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class FilmTest extends TestCase
{
    public function testSviFilmovi()
    {
       // ima li filmova?
       // ima li barem 1000 filmova?
       // je li najstariji film 1970 ?
       $filmovi=Film::all();
       $this->assertNotNull($filmovi); // vraca prazan array pa nije NULL
       $this->assertCount(1000, $filmovi); // Racuna mi broj filmova u polju
       $this->assertGreaterThanOrEqual(1000, $filmovi->count());
       
        $filmovi= Film::orderBy('release_year')->get();

      // $godina1970 = Film::orderBy('release_year')->get()->release_year; // VRACA SVE
         $godina1970 = Film::orderBy('release_year')->first()->release_year;      // VRACA SAMO PRVI ZAPIS
       $this->assertEquals(1970, $godina1970);
    }
        /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFilmIdJednakoJedan()
    {
        $f1=Film::findorfail(1);      
        $trazeninaslov=$f1->find(1)->title;
        $this->assertEquals('ACADEMY DINOSOURAUR', $f1->title);
        $this->assertEquals('ACADEMY DINOSOURAUR', $trazeninaslov);
        $this->assertEquals('A Epic Drama of a Feminist And a Mad Scientist who must Battle a Teacher in The Canadian Rockies', $f1->description);
        $this->assertGreaterThanOrEqual(2000, $f1->release_year);
        $this->assertLessThanOrEqual(2014, $f1->release_year);       
        $this->assertIsFloat((float)$f1->rental_rate);
        $this->assertClassHasAttribute('primaryKey', 'App\Film'); // Klasa FIlm ima svojstvo PK !!
        /*
             film_id: 1,
     title: "ACADEMY DINOSOURAUR",
     description: "A Epic Drama of a Feminist And a Mad Scientist who must Battle a Teacher in The Canadian Rockies",
     release_year: 2014,
     language_id: 4,
     original_language_id: null,
     rental_duration: 6,
     rental_rate: "0.99",
     length: 86,
     replacement_cost: "20.99",
     rating: "PG",
     special_features: "Deleted Scenes,Behind the Scenes",
     last_update: "2020-05-27 21:01:32",
     created_at: null,
     updated_at: null,

         * 
         * 
         * 
         */
    }
}
