<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  <style type="text/css">
  .card{
   /* Add shadows to create the "card" effect */
   width: 240px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    background-color: white;
    transition: 0.3s;
    margin: 2%;

  }
  .card img{
    width: 100%;
  }

/* On mouse-over, add a deeper shadow */
  .card:hover {
      box-shadow: 0 8px 16px 0 rgba(239, 203, 240, 1);
  }

  /* Add some padding inside the card container */
  .container {
      padding: 2px 16px;
  }

  .card-container{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    background-color: #DCE6EE;
    padding: 4%;
    margin: 4%;
   }

   a {
    text-decoration: none;}
     

 


 

  </style>
  </head>
  <body>
  <div class="nav-container">
        <div class="nav">
            @if (Route::has('login'))
                <div class="links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
      </div>
</div>


    <div class="card-container">
     @foreach ($salons as $salon)
     <div class="card">
     <a href="{{ URL::to('/show/' . $salon->id) }}">
       <img src="{{$salon->image}}">
        <div class="container">
         <h4><b>{{$salon->name}}</b></h4> 
         <p>{{$salon->discription}}</p> 
        </div>

       
       </a></div>
      @endforeach
    </div>
  
 
  </body>
</html>