<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  <style type="text/css">
  

  

 

  </style>
  </head>
  <body>


   
    <div class="salon-container">
     
     
     
       <img src="{{ asset('uploads/' . $salon->image) }}">
        <div class="salon-text">
         <h4><b>{{$salon->name}}</b></h4> 
         <p>{{$salon->discription}}</p> 
        </div>
        </div>

      <div class="Services">
     
     
   
      @foreach ($salon->service as $service)
     <div class="card">
     <a href="{{ URL::to('/show/' . $service->id) }}">
       <img src="{{ asset('uploads/' . $service->image) }}">
        <div class="card-text">
         <h4><b>{{$service->name}}</b></h4> 
         <p>{{$service->discription}}</p>
          <p>{{$service->price}}</p>  
        </div>
         </div>
       
        @endforeach
     
    </div>
  
 
  </body>
</html>