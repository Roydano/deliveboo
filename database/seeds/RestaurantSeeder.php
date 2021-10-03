<?php
// require_once 'vendor/autoload.php';
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;
use Illuminate\Support\Str;
// use Faker\Provider\it_IT\Person;
// use Faker\Provider\en_US\PhoneNumber;
// use Faker\Provider\en_US\Address;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)

    {
        // $faker = Faker\Factory::create();
        
        // for ( $i = 0; $i <= 6; $i++ ) {
        //      $newRestaurant = new Restaurant();
        //      $newRestaurant->name = $faker->name();
        //      $newRestaurant->address = $faker->address();
        //      $newRestaurant->phone = $faker->randomNumber(5, true);
        //      $newRestaurant->p_iva = $faker->randomNumber(5, true);
        //      $newRestaurant->slug = Str::slug($newRestaurant->name, '-');
        //      // check default img

        //      $newRestaurant->save();
        // }
        for( $i = 0; $i < 10; $i++){
            $newRestaurant = new Restaurant();

            $newRestaurant->name =$faker->name();
            $newRestaurant->address =$faker->address();
            $newRestaurant->phone =$faker->isbn10();
            $newRestaurant->p_iva = $faker->isbn10();
            $newRestaurant->slug = Str::slug($newRestaurant->name, '-');
            $newRestaurant->img = 'img.png';

            $newRestaurant->save();


        }
    }

}
