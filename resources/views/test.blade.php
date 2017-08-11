<!DOCTYPE html>
<html><head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.3.0/jquery.timepicker.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
</head>
<body>

<h1>The XMLHttpRequest Object</h1>


<input type="date" id="dt" onchange="setDate(event);"/>

<div class="showtime"> <input type="text" class="timepicker" id="selector"></div>
<button onclick="myFunction()">Click me</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.3.0/jquery.timepicker.js"></script>
<script>
$( document ).ready(function() {
   $("#selector").hide();
});
function setDate(e) {
  var xhttp = new XMLHttpRequest();
  var selectedDate=(e.target.value);

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	$('#selector').timepicker({
    'disableTimeRanges': [
        ['1am', '2am'],
        ['3am', '4:01am']
    ]
});
    $("#selector").show();
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
