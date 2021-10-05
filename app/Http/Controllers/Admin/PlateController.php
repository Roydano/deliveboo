<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Plate;
use App\Restaurant;
use App\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
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
        $courses = Course::all();
        return view('admin.addPlate', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();

        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'description' => 'nullable|max:250',
            'ingredients' => 'max:250',
            'visible' => 'required',
            'img' => 'nullable|image'
        ]);

        $data = $request->all();

        $newPlate = new Plate();

        $slug = Str::slug($data['name'],'-');
        $slugBase = $slug;
        $slugPresent = Plate::where('slug', $slug)->first();

        $count = 1;
        while($slugPresent){
            $slug = $slugBase . '-' .$count;
            $slugPresent = Plate::where('slug', $slug)->first();
            $count++;
        }

        $newPlate->slug =  $slug;

        /* if(array_key_exists('image', $data)) {
            $img_path = Storage::put('images', $data['image']);
            $data['image'] = $img_path;
        } */

        $newPlate->restaurant_id = $restaurant->id;
        $newPlate->fill($data);
        $newPlate->save();
        
        return redirect()->route('admin.plates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $plate = Plate::where('slug', $slug)->first();
        return view('admin.showPlate', compact('plate'));
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
