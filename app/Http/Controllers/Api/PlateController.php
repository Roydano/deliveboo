<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plate;
use App\Cuisine;
use App\Restaurant;
use App\Course;

class PlateController extends Controller
{
    /**
     * Display the plates that belongs to a given course
     *
     * @return \Illuminate\Http\Response
     */
    public function showByRestCourse($slug, $slugCourse)
    {
        var_dump($slug . $slugCourse);
        $restaurant = Restaurant::where('slug', $slug)->first();
        $course = Course::where('slug', $slugCourse)->first();
        var_dump($course);
        $plates = Plate::where('restaurant_id', $restaurant->id)->all();

        foreach($plates as $plate) {
            $plate->img = url('storage/' . $plate->img);
        }
        
            
        return response()->json([
            'success' => true,
            'results' => array($plates, $course)
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($id)
    {
        //
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
}
