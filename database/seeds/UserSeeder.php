<?php
require_once 'vendor/autoload.php';
use Illuminate\Database\Seeder;
use App\User;


class UserSeeder extends Seeder
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
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make($faker->lastName()); //scopo esemplificativo
            $newUser->save();
        }
    }
}
