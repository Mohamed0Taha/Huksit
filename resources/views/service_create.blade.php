<html>
  <head>
    <title>Huksit</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>

  body {
    margin: 0;
    padding: 0;
    text-align: center; /* !!! */
}

 .content { display: block;
    margin: auto;
    width: 40%;
  }

    </style>

  </head>
  <body>
    <div class="container">
      <div class="content">
        
       
        <form action="/service_create" method="post" enctype="multipart/form-data">
          <label>Create your service:</label><br> 
         
           <input id ="name" type="text" name="title" value="Your service's name" class="form-member" required="true"><br><br>  
           <input id ="price" type="text" name="price"  class="form-member" required="true"><br><br> 
            <textarea id='discription' rows="4" cols="25" name="discription"  class="form-member" maxlength="200" required="true">Discription here...</textarea><br><span id='remainingC'></span><br> 
             
             <input  type="file" name="file" id="file"  class="btn btn-primary " required="true"><br> 
            <input type="submit"  class="btn btn-primary value="Upload" name="submit"><br> 
          <input type="hidden" value="{{ csrf_token() }}" name="_token">
          <input type="hidden" value="{{ 1 }}" name="id">
        </form>

      </div>
    </div>
  </body>
      <script> 

$('#discription').keypress(function(){

    if(this.value.length > 160){
        return false;
    }
    $("#remainingC").html("Remaining characters : " +(160 - this.value.length));
});

</script>
</html>