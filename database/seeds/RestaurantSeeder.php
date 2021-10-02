<?php
require_once 'vendor/autoload.php';
use Illuminate\Database\Seeder;
use App\Restaurant;
use Illuminate\Support\Str;
use Faker\Provider\it_IT\Person;
use Faker\Provider\en_US\PhoneNumber;
use Faker\Provider\en_US\Address;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $faker = Faker\Factory::create();
        
        for ( $i = 0; $i <= 6; $i++ ) {
             $newRestaurant = new Restaurant();
             $newRestaurant->user_id = $i+1;
             $newRestaurant->name = 'Ristorante ' . $faker->name();
             $newRestaurant->address = $faker->address();
             $newRestaurant->phone = $faker->phoneNumber();
             $newRestaurant->p_iva = $faker->randomNumber(5, true);
             $newRestaurant->slug = Str::slug($newRestaurant->name, '-');
             // check default img

             $newRestaurant->save();
        }

}
