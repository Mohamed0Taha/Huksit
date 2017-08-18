<?php

namespace App\Http\Controllers;

use App\salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jcf\Geocode\Geocode;

class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() 
    {

    $this->middleware('auth', ['except' => ['index']]); 

    }
    public function index()
    {
        $circle_radius = 3959;
        $miles = 20;
        $latitude= '60.4834005';
        $longitude = '22.117078';

        $salons =Salon::select('*')->whereRaw("latitude between($latitude - ($miles*0.018)) and ($latitude + ($miles*0.018))")
        ->whereRaw("longitude between($longitude - ($miles*0.018)) and ($longitude + ($miles*0.018))")->get();
        
             
      

        return view('welcome',compact('salons'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('salon_create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if ($request->hasFile('file')) { 

            echo 'Uploaded';
            $file = $request->file('file');
            $image_old_name=$file->getClientOriginalName();
            $file->move('uploads', $image_old_name);
            $prefix = preg_replace('/\s+/', '', $request->input('name'));
            $image_new_name= $prefix.$file->getClientOriginalName();
            rename('uploads/'.$image_old_name, 'uploads/'.$image_new_name);

            $response = Geocode::make()->address('kastarikatu 1D,Turku');

            if ($response) {
           $salon = new Salon;
           $salon->address='fake address';
           $salon->latitude=$response->latitude();
           $salon->longitude=$response->longitude();
           $image= $image_new_name;
           $salon->name=$request->input('name');
           $salon->discription=$request->input('discription');
           $salon->image=$image;
           $salon->user_id=Auth::id();
           $salon->save();
       }
          
    }

       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function show(Salon $id)
    {
        $salon=Salon::find($id)->first();
    
        
        return view('salon_show')->with('salon', $salon);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function edit(salon $salon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, salon $salon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function destroy(salon $salon)
    {
        //
    }
}
