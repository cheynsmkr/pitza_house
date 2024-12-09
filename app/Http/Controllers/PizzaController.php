<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; //wajib

class PizzaController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addPizza()
    {
        return view('addPizza');
        // dd($request->toArray());

    }

    public function add_pizza(Request $request)
    {
        // dd($request->toArray());
    
        $addPizza = new Pizza();         
        
        $addPizza->name         =   $request->pizzaName;
        $addPizza->description  =   $request->description;
        $addPizza->small        =   $request->small;
        $addPizza->medium       =   $request->medium;
        $addPizza->large        =   $request->large;
        $addPizza->photo        =   $request->photo;

        // if($request->hasFile('photo')){

        //     $file = $request->file( 'photo');
        //     // dd($file);
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->storeAs($filename, 'pizzaphoto');
        //     $addPizza->photo = $filename;

        // }else{
        //     // return $request;
        //     // dd('$request->photo');
        //     $addPizza->photo = '';

        // }

        if (!empty($request->has('photo'))) {
            $image = $request->file('photo');
            $newName = Str::slug(time());
            $image->storeAs ('', $newName . '.' . $image->getClientOriginalExtension(),'pizzaphoto');
            $addPizza->photo = $newName . '.' . $image->getClientOriginalExtension();
        }
//          else {
//             $addPizza->photo = 'https://placehold.co/600x400';
//         }
// dd('notsave');

        $addPizza->save();
        return redirect()->back()->with('success', 'Pizza added succesfully');
    }



}
