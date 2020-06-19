<?php

namespace Tests\Browser;

//use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ActorTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testListaGlumacaNaslov()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/actors')
                    ->assertSee('Lista glumaca');
        });
    }
    /**
     * Treba kliknuti na prvi link EDIT
     * body > div > ol > li:nth-child(1) > a:nth-child(1)
     */
        public function testEditPrvogGlumca()
    {
        $this->browse(function (Browser $browser) {
            $selector='body > div > form > div:nth-child(3) > input[type=text]:nth-child(7)';
            $browser->visit('/actors')               // odi na stranicu
                    ->assertPresent('#actor-1-edit') // pogledaj da postoji ID actor-1-edit
                    ->click('#actor-1-edit')         // klikni na taj link
                    ->assertPathIs('/actors/1/edit') // uvjeri se da su otisao na tu stranicu
                    ->assertSee("Uredi glumice/glumca") // uvjeri se da text postoji na toj stranici
                    ->screenshot('edit-glumci'); // opali screen capture
                   //TODO ne radi provjera pol;ja ->assertAttribute('first_name', 'value', 'Penelope');
                    //->$browser->clickLink($linkText);
        });
    }
            public function testEditGlumicePenelope()
    {
        $this->browse(function (Browser $browser) {
            $selector='body > div > form > div:nth-child(3) > input[type=text]:nth-child(7)';
            $browser->visit('/actors/1/edit')               // odi na stranicu
                    ->assertPathIs('/actors/1/edit'); // uvjeri se da su otisao na tu stranicu
            $browser->clear('first_name');
            $browser->type('first_name', 'Anastasia')
                    ->screenshot('edit-glumci-anastasia');
            $browser->press('actor_sbm') // button (Izmijeni detalje glumice/glumca)
                       ->assertPathIs('/actors')
                       ->assertSee("Anastasia")
                    ->screenshot('edit-glumci-anastasia-submit');
             
            // povratak na staro
            $actor = new \App\Actor();
            $g=$actor->find(1);
            $g->first_name='Penelope';
            $g->save();
        
            

        });
    }
}
