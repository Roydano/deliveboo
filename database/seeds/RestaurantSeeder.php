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


        /* $faker = Faker\Factory::create();
        
        //attenzione a id: in relazione con user in seed -> cambia indice per farlo corrispondere
        for ( $i = 0; $i <= 6; $i++ ) {
             $newRestaurant = new Restaurant();
             $newRestaurant->user_id = $i+1;
             $newRestaurant->name = 'Ristorante ' . $faker->name();
             $newRestaurant->address = $faker->streetAddress();
             $newRestaurant->phone = $faker->phoneNumber();
             $newRestaurant->p_iva = $faker->randomNumber(5, true);
             $newRestaurant->slug = Str::slug($newRestaurant->name, '-');
             // check default img

             $newRestaurant->save();
        } */

        $rests = Restaurant::all();
        foreach($rests as $rest) {
            $rest->img = 'img/default.jpg';
            $rest->save();
        }
    }
}


$restaurants = [
	[
	 'name' => 'Gibas',
	 'slug' => 'gibas',
	 'address' => 'Via Monte Amiata, 12',
	 'img' => 'img/gibas.jpg',
	 'phone' => '0721 204572',
     'type' => 'Cucina italiana'
    ],
	[
	 'name' => 'Iamaki',
	 'address' => 'Corso Garibaldi, 20',
	 'img' => 'img/iamaki.jpg',
	 'phone' => '0721 276523',
     'cuisine' => 'Giapponese'
    ],
	[
	 'name' => 'Okebab Milano',
	 'address' => 'Via Spadari, 17',
	 'img' => 'img/okebab.jpg',
	 'phone' => '0721 865198',
     'cuisine' => 'Kebab'
    ],
	[
	 'name' => 'Poke Wow',
	 'address' => 'Via Gian Battista, 1',
	 'img' => 'img/poke-wow.jpeg',
	 'phone' => '0721 418544',
     'cuisine' => 'Libanese'
    ],
	[
	 'name' => 'Cheat Meals Burger',
	 'address' => 'Via Carlo Tenca, 10',
	 'img' => 'img/cheat-meals.jpeg',
	 'phone' => '0721 541987',
     'cuisine' => 'Americana'
    ],
	[
	 'name' => 'Porkobio',
	 'address' => 'Via Ruggero Boscovich, 22',
	 'img' => 'img/porkobio.jpg',
	 'phone' => '0721 456123',
     'cuisine' => 'Americana'
    ],
	[
	 'name' => 'Moletto',
	 'address' => 'Via Monte Rosa, 34',
	 'img' => 'img/moletto.jpg',
	 'phone' => '0721 345654',
     'cuisine' => 'Italiana'
    ],
	[
	 'name' => 'Wiki Sushi',
	 'address' => 'Via Milano, 1',
	 'img' => 'img/wiki.jpg',
	 'phone' => '0721 563516',
     'cuisine' => 'Italiana'
    ],
	[
	 'name' => 'Mc Donalds',
	 'address' => 'Via Napoli, 22',
	 'img' => 'img/mc.jpg',
	 'phone' => '0721 456123',
     'cuisine' => 'Americana'
    ],
	[
	 'name' => 'Kfc',
	 'address' => 'Via Milano, 92',
	 'img' => 'img/kfc.jpg',
	 'phone' => '0721 789456',
     'cuisine' => 'Americana'
    ],
	[
	 'name' => 'Cantine Milano',
	 'address' => 'Via Pescara, 52',
	 'img' => 'img/cantine.jpg',
	 'phone' => '0721 159456',
     'cuisine' => 'Italiana'
    ],
	[
	 'name' => 'Garagol',
	 'address' => 'Via Battisti, 2',
	 'img' => 'img/garagol.jpg',
	 'phone' => '0721 147896',
     'cuisine' => 'Italiana'
    ],
	[
	 'name' => 'Scudiero',
	 'address' => 'Via Augusto, 78',
	 'img' => 'img/scudiero.jpg',
	 'phone' => '0721 153245',
     'cuisine' => 'Italiana'
    ],
	[
	 'name' => 'Zorbas',
	 'address' => 'Via Mancini, 13',
	 'img' => 'img/zorbas.jpg',
	 'phone' => '0721 789325',
     'cuisine' => 'Greca'
    ],
	[
	 'name' => 'Sushi Corner',
	 'address' => 'Via Milano, 14',
	 'img' => 'img/corner.jpg',
	 'phone' => '0721 147896',
     'cuisine' => 'Giapponese'
    ],
]
]