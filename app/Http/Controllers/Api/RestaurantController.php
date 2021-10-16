<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Cuisine;
use App\Course;
use App\Plate;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::paginate(9);

        foreach($restaurants as $restaurant) {
            $restaurant->img = url('storage/' . $restaurant->img);
        }
        
        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();

        $restaurant->img = url('storage/' . $restaurant->img);
            
        return response()->json([
            'success' => true,
            'results' => $restaurant
        ]);
    }

    /**
     * Display the restaurant's cuisines.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function showCuisines($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->with('cuisines')->first();
        $cuisines = $restaurant->cuisines;
            
        return response()->json([
            'success' => true,
            'results' => $cuisines
        ]);
    }

    
    

    /**
     * Display restaurant's plates
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function showMenu($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        $plates = Plate::where('restaurant_id', $restaurant->id)->get();

        foreach($plates as $plate) {
            $plate->img = url('storage/' . $plate->img);
        }
        
            
        return response()->json([
            'success' => true,
            'results' => $plates
        ]);
    }

    /**
     * Display restaurant's plates filtered by course
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function showCourses($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        $plates = $restaurant->plates;
        $courseIds = [];
        
        foreach($plates as $plate) {
            $courseIds[] = $plate->course_id;
        }

        

        $courses = Course::select('*')->whereIn('id', $courseIds)->get();
            
        return response()->json([
            'success' => true,
            'results' => $courses
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // inserito da danilo come prova
}
