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
        DB::table('cuisines')->delete();

        $cuisines =  [
            'Americana',
            'Cinese',
            'Giapponese',
            'Greca',
            'Indiana',
            'Italiana',
            'Libanese',
            'Messicana',
            'Thailandese',
            'Vegetariana',
            'Vegana'
        ];
        

        foreach($cuisines as $cuisine) {

            $newCuisine = new Cuisine();

            $newCuisine->name = $cuisine;
            $newCuisine->img = 'img/' . strtolower($cuisine) . ".jpg";
            $newCuisine->slug = Str::slug($newCuisine->name, '-');

            $newCuisine->save();
        }
        
    }
}
