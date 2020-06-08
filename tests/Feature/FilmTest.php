<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FilmTest extends TestCase {

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFilmIndex() {
        $response = $this->get('/films');
        $response->assertStatus(200);

        $this->visit('/films')
                ->see('Lista filmova')
                ->dontSee('Error');
    }

    public function testExample() {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

}
