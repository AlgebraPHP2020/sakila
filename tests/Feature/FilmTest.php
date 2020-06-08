<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FilmTest extends TestCase {

 public function testFilmDodajNovi() {
        $response = $this->get('/films/create');
        $response->assertStatus(200)
                ->assertSee('Dodaj film');    
 }
    
    public function testFilmIndex() {
        $response = $this->get('/films');
        $response->assertStatus(200)
                ->assertSee('Lista filmova')
                ->assertDontSee('error');
        
        
        
       //TODO rjesi ove testove
       /*
        $this-> visit('/films')
                ->see('Lista filmova')
                ->dontSee('Error');
        * 
        */
    }

    public function testExample() {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

}
