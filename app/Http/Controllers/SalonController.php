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
           $salon = new Salon;
           $salon->address=$request->input('address');
           $salon->name=$request->input('name');
           $salon->discription=$request->input('discription');
           $salon->image=$request->input('image');
           $salon->user_id=Auth::id();
           $salon->save();

           echo "Salon created";
           var_dump($request->input('image'));
       
          
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
