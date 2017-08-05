<?php

namespace App\Http\Controllers;

use App\salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $salons=Salon::all();

        return view('salons',compact('salons'));
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
       if ($request->hasFile('file')) { 

            echo 'Uploaded';
            $file = $request->file('file');
            $file->move('uploads', $file->getClientOriginalName());

           $image= $file->getClientOriginalName();
           $salon = new Salon;
           $salon->name=$request->input('name');
           $salon->discription=$request->input('discription');
           $salon->image=$image;
           $salon->user_id=Auth::id();
           $salon->save();
          
        }

       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function show(salon $salon)
    {
        //
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
