<?php

namespace App\Http\Controllers;

use App\service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
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
          return view('service_create');
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

         

       $service = new Service;
           $image= $image_new_name;
           $service->title=$request->input('title');
           $service->discription=$request->input('discription');
           $service->discription=$request->input('price');
           $service->image=$image;
           $service->salon_id= $request->input('id');
           $service->save();
       
          
    }
  }
    /**
     * Display the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $id)
    {
        $service=Service::find($id)->first();
    
        
        return view('service_show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $service)
    {
        //
    }

   
}
