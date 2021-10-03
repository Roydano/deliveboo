<?php

use Illuminate\Database\Seeder;
use App\Cuisine;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cuisines = config('cuisine');

        

        foreach($cuisines as $cuisine){

            $newCuisines = new Cuisine();

            $newCuisine->name = $cuisine;
            $newCuisine->img = 'immagine da inserire';

            $newCuisine->save();

        }
        
    }
}
