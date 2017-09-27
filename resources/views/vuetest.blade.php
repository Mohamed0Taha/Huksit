<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
   
  <body>

  <div id="root">
  <salon name="Salon" discription="blaj blah blah" photo="https://www.w3schools.com/howto/img_avatar.png"></salon>
</div>  


<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js">
</script>
<script type="text/javascript">
	// register
Vue.component('salon', {
	props:['photo','name','discription'],

  template: `<div class="card">
  <img src="@{{ photo }}" style="width:100%">
  <div class="container">
    <h4><b>@{{name}}</b></h4> 
    <p>@{{discription}}</p> 
  </div>
</div>

<style>
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
    padding: 2px 16px;
}
</style>

`
});
// create a root instance
new Vue({
  el: '#root'
})
</script>
  </body>
</html>

