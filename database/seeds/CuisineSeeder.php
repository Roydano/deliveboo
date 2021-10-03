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
        /* $cuisines = Config::get('cuisine');
        dd($cuisines); */ 
        // GIVES NULL

        $cuisines =  [
            'Americana',
            'Cinese',
            'Giapponese',
            'Greca',
            'Indiana',
            'Italiana',
            'Libanese',
            'Messicana',
            'Pizza',
            'Thailandese',
            'Vegetariana',
            'Vegana'
        ];
        

        foreach($cuisines as $cuisine) {

            $newCuisine = new Cuisine();

            $newCuisine->name = $cuisine;
            $newCuisine->img = 'immagine da inserire';
            $newCuisine->slug = Str::slug($newCuisine->name, '-');

            $newCuisine->save();
        }
        
    }
}
