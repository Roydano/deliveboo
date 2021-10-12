<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\Plate;

class PlateSeeder extends Seeder
{
    /**
     * 
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

        for( $i = 0; $i < 50; $i++){

            
            $newPlate = new Plate();
        
            $newPlate->name =$faker->foodName();
            $newPlate->description =$faker->paragraph(2);
            $newPlate->ingredients =$faker->dairyName() . ' ' . $faker->vegetableName() . ' ' . $faker->meatName() . ' ' . $faker->sauceName();
            $newPlate->img = 'piatto.jpg';
            $newPlate->slug = Str::slug($newPlate->name, '-') . $i;
            $newPlate->restaurant_id = 18;
            $newPlate->course_id = $faker->numberBetween(1, 5);
            $newPlate->price = $faker->randomFloat(2, 5, 30); //da seedare courses

            $newPlate->save();
        }
    }
}