<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cuisine;
use App\Restaurant;
use Illuminate\Pagination\LengthAwarePaginator;

class CuisineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuisines = Cuisine::all();
        foreach($cuisines as $cuisine) {
            $cuisine->img = url('storage/' . $cuisine->img);
        }

        return response()->json([
            'success' => true,
            'results' => $cuisines
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
     * Display the restaurants that belongs to a given cuisine()
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $cuisine = Cuisine::with('restaurants')->where('slug', $slug)->first();


        $restaurants = $cuisine->restaurants;

        // collection - count - per page - current page - 
        $curr_page = 1;
        $per_page= 3;
        $paginate = new LengthAwarePaginator(
            $restaurants->forPage($curr_page, $per_page),
            $restaurants->count(),
            $per_page,
            $curr_page,

        );

      
        

            
        return response()->json([
            'success' => true,
            'results' => $paginate
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
}



