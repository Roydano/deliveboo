<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Plate;
use App\Restaurant;
use App\Course;
use App\Cuisine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        $plates = $restaurant->plates()->orderBy('name', 'ASC')->get();
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
            'description' => 'required|max:250',
            'ingredients' => 'required|max:250',
            'img' => 'nullable|image'
        ]);

        $data = $request->all();

        $newPlate = new Plate();
        
        if (!array_key_exists('visible', $data)) {
            $newPlate->visible = 0;
        }

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

        if(array_key_exists('img', $data)){

            // dd($data);

            $coverPath = Storage::put('img', $data['img']);

            $data['img'] = $coverPath;
        }

        $newPlate->fill($data);
        $newPlate->save();
        
        return redirect()->route('admin.plates.index')->with('create', 'Il piatto ' . $newPlate->name . ' è stato aggiunto con successo!');
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
        $authorize = $plate->restaurant->user->id;

       

        if($authorize !== Auth::user()->id){
            return redirect()->route('admin.plates.index')->with('autorizzazione', 'Non hai i permessi per vedere questo piatto!');
        }

        return view('admin.showPlate', compact('plate'));

        

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $plate = Plate::where('slug', $slug)->first();
        $courses = Course::all();

        
        $authorize = $plate->restaurant->user->id;

       

        if($authorize !== Auth::user()->id){
            return redirect()->route('admin.plates.index')->with('autorizzazione', 'Non hai i permessi per modifcare questo piatto!');
        }
        

        
        return view('admin.editPlate', compact('plate', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        
        

        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'description' => 'nullable|max:250',
            'ingredients' => 'required|max:250',
            'img' => 'nullable|image'
        ]);

        $data = $request->all();

        if (!array_key_exists('visible', $data)) {
            $plate->visible = 0;
        }


        $slug = Str::slug($data['name'], '-');

        if($data['name'] != $plate->name){
            $data['slug'] = Str::slug($data['name'], '-');
            $slugBase = $data['slug'];
            $slugPresent = Plate::where('slug', $data['slug'])->first();
            $count = 1;

            while($slugPresent){
                $slug = $slugBase. '-' . $count;
                $slugPresent = Plate::where('slug', $slug)->first();
                $count++;
            }

            $data['slug'] = $slug;
        }

        if(isset($data['img'])){
            //salviamo la nostra immagine e recuperiamo il path
            // dd($data);

            $coverPath = Storage::put('img', $data['img']);


            Storage::delete($plate->img);
            //salviamo nella colonna della tabella posts l'immagine con il suo percorso
            $data['img'] = $coverPath;
        }
        else{

            $data['img'] = $plate->img;
        }



        $plate->update($data);

        return redirect()->route('admin.plates.index')->with('edit', 'il piatto ' . $plate->name . ' è stato modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        

        Storage::delete($plate->img);
        $plate->delete();

        return redirect()->route('admin.plates.index')->with('delete', 'il piatto ' . $plate->name . ' è stato cancellato correttamente!');
    }

    

}
