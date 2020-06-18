<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * php artisan db:seed
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(ActorSeeder::class);
        $this->call(CategorySeeder::class);   
        $this->call(FilmSeeder::class);
    }
}
