<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Restaurant;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'restName' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'numeric', 'min:11'],
            'p_iva' => ['required', 'numeric'], //add validation giusto
            'img' => ['string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     * 
     */
    protected function create(array $data)
    {   
        // create user
        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        // generate slug based on restaurant name
        $slug = Str::slug($data['restName'],'-');
        $slugBase = $slug;
        $slugPresent = Restaurant::where('slug', $slug)->first();

        $count = 1;
        while($slugPresent){
            $slug = $slugBase . '-' .$count;
            $slugPresent = Restaurant::where('slug', $slug)->first();
            $count++;
        };

        // create restaurant with foreign key user_id
        $newUser->restaurant()->create([
            'name' => $data['restName'], 
            'address' => $data['address'],
            'phone' => $data['phone'],
            'slug' => $slug,
            'p_iva' => $data['p_iva']
        ]);

        return $newUser;
        

       /*  $data['user_id'] = $newUser->id;

        $newRestaurant = new Restaurant(); */

        /* $newRestaurant->name = $data['restName'];
        $newRestaurant->fill($data);
        $newRestaurant->save(); */

        /* $newRestaurant = Restaurant::create([
            'user_id' => $data['user_id'],
            'name' => $data['name'], 
            'address' => $data['address'],
            'phone' => $data['phone'],
            'p_iva' => $data['p_iva']
        ]); */
    }
}
