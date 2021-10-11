<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Restaurant;
use App\Cuisine;
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
            'phone' => ['required', 'numeric', 'digits_between:4,11'],
            'p_iva' => ['required', 'numeric', 'digits:11', 'unique:restaurants'],
            'img' => ['string'],
            'cuisine' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
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
            $slug = $slugBase . '-' . $count;
            $slugPresent = Restaurant::where('slug', $slug)->first();
            $count++;
        };


        if(array_key_exists('img', $data)) {
            $img_path = Storage::put('images', $data['img']);
            $data['img'] = $img_path;
        } else {
            $data['img'] = 'img/default.jpg';
        }
        
        // create restaurant with foreign key user_id
        $newUser->restaurant()->create([
            'name' => $data['restName'], 
            'address' => $data['address'],
            'phone' => $data['phone'],
            'slug' => $slug,
            'p_iva' => $data['p_iva'],
            'img' => $data['img']
        ]);

        if(array_key_exists('cuisine', $data)) {
            var_dump($data['cuisine']);
            foreach($data['cuisine'] as $id) {
                $cuisine = Cuisine::find($id);
                $restaurants = Restaurant::where('user_id', $newUser->id)->first();
                
                $cuisine->cuisineRestaurants()->attach($restaurants);
            }
                
        }

        return $newUser;
        
    }

    public function showRegistrationForm()     
    {         
        $cuisines = Cuisine::all();
        return view('auth.register', compact('cuisines'));     
        
    }
}
