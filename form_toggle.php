<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#show").click(function(){
    $("#panel2").slideToggle(500);
  });
  
   $("#flip").click(function(){
    $("#panel").slideToggle(10);
  });
  
});
</script>
<style> 
#panel, #flip, #panel2{
  padding: 5px;
  text-align: center;
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
  
}

#panel,#panel2 {
  padding: 50px;
  display: none;
}

#panel2 {
  padding: 100px;
  display: none;
}
</style>
</head>
<body>
 <button id="show">Show</button>
<div id="flip">Click to slide down panel</div>
<div id="panel">Hello world!</div>
<div id="panel2">OKKKK</div>


</body>
</html>
