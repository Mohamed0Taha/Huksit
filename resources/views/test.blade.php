<!DOCTYPE html>
<html><head>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
  .booked{
    text-decoration-style: line-through;
    background-color: lightgreen;
    color: green;
  }

  
</style>

</head>

<body>

<h1>The XMLHttpRequest Object</h1>


<input type="date" id="dt" onchange="setDate(event);"/>
 <select id="select">
    <option >Choose a Time</option>
    
  </select>
<button type="button" class="btn btn-success">Book me</button>


<script>


function setDate(e) {
  var xhttp = new XMLHttpRequest();
  var selectedDate=(e.target.value);
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

    	var options =  $.parseJSON(xhttp.response);

      options.sort(function(a, b) {
    return parseFloat(a.rank) - parseFloat(b.rank);
     });
      console.log(options);


      $('#select').empty();
     $.each(options, function(i, p) {

      if (p.label=='booked') {
        $('#select').append($('<option disabled></option>').val(p.data).html(p.data).addClass(p.label));
            }
      else {
          $('#select').append($('<option></option>').val(p.data).html(p.data).addClass(p.label));
                }
});


    }
  };
  xhttp.open("GET", "/ajax_url/1/"+selectedDate, true);
  xhttp.send();
}
$("#selector").on('change', function(){
    var time = $(this).val();
    alert(time);
})
</script>

</body>
</html>
