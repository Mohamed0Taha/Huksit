<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  <style type="text/css">
  

  /* Add some padding inside the card container */
  .container { margin-left: 5%;
     
  }

  .card-container{
    display: flex;

    flex-wrap: wrap;
    justify-content: flex-start;
    background-color: #DCE6EE;
    
    margin: 4%;
   }

   a {
    text-decoration: none;}
     
.card-container img {
    width: 50%;
    height: 40%;
   }

 


 

  </style>
  </head>
  <body>


   
    <div class="card-container">
     
     
     
       <img src="{{ asset('uploads/' . $salon[0]->image) }}">
        <div class="container">
         <h4><b>{{$salon[0]->name}}</b></h4> 
         <p>{{$salon[0]->discription}}</p> 
        </div>

       
       
     
    </div>
  
 
  </body>
</html>