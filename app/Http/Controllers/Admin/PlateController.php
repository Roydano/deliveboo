<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Plate;
use App\Restaurant;
use Illuminate\Database\Eloquent\Model;

class PlateController extends Controller
{

    /* public function showPlates() {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        $plates = Plate::where('restaurant_id', $restaurant->id);
        return $plates;
    } */
    
    
    
    /* public function showPlates($id){
        $plates = Plate::where('restaurant_id', $id);
        

        return view('admin.plateRestaurant', compact('plates'));
    } */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // da questo errore ArgumentCountError
        // Too few arguments to function App\Http\Controllers\PlateController::index(), 0 passed in D:\PROGETTI GRAFICA\BOOLEAN\CORSO BOOLEAN\LAVORI\MAMP\deliveboo\vendor\laravel\framework\src\Illuminate\Routing\Controller.php on line 54 and exactly 1 expected 
        // $restaurant = Restaurant::where('user_id', Auth::user()->id);
    //     $plates = Plate::where('restaurant_id', $id);
        
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        $plates = $restaurant->plates()->get();
        return view('admin.plateRestaurant', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addPlate');
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
