<!DOCTYPE html>
<html>
<head><script charset="utf-8" src="https://ucarecdn.com/libs/widget/3.1.3/uploadcare.full.min.js"></script>
</head>
<body>

<form action="/salon_create" method="post" >
  name: <input type="text" name="name"><br>
  discription: <input type="text" name="discription"><br>
    address: <input id="geocomplete" type="text" placeholder="Type in an address" size="90" /><br>
<input type="hidden" role="uploadcare-uploader" name="image" data-public-key="2162689122e7bc33c1cb" data-images-only  data-clearable="true" data-crop ="free" /><br>
  <input type="hidden" value="{{ csrf_token() }}" name="_token">
  <input type="submit" value="Submit">
</form>



</body>
</html>
