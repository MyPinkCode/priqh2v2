<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>carte des projets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="source/icon.png">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/geo.css">
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> 
        <style>
       #map {height:600px}
        .cont{width:100%;}
        .well{width:100%;} 
        img{
  max-width:180px;
}
      </style>


  <?php
	session_start();
	include("connection.php");
  $con=connect();
  if (!isset($_SESSION['id'])) { header("location:login.php"); } 
	
?>
  </head>

  <body>
 
        <input type="checkbox" class="check" id="checked">
        <label class="menu-btn" for="checked">
          <span class="bar top"style=" background:black"></span>
          <span class="bar middle"style="background:black"></span>
          <span class="bar bottom" style="background:black"></span>
          <span class="menu-btn__text"></span>
        </label>
        <label class="close-menu" for="checked" ></label>
        <nav class="drawer-menu">
        <ul>
         <li> <a href="index.php"> home</a></li>
         <li><a href="http://localhost/priqh2/geo.php?data=0">geolocalisation </a></li>
         <li><a href="http://localhost/priqh2/map.php?data=0&com=0">carte </a></li>
         <li><a href="add.php"><b>ajout projet</b></a></li>
         <li><a href="addQphp.php"><b>ajout quartier</b></a></li>
          <li><a href="logout.php"><b>Logout</b></a></li>
        </ul>
        </nav>
        <div class="cont">

<form class="well form-horizontal" id="contact_form" method="post" action="createQ.php">
<fieldset>

<!-- Form Name -->
<legend>Ajout quartier</legend>

<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label">nom quartier</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
<input  name="name" placeholder="nom quartier" class="form-control"  type="text"required>
</div>
</div>
</div>


<div class="form-group"> 
<label class="col-md-4 control-label">gouvernorat</label>
<div class="col-md-4 selectContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
<select name="gouv" id="gouv" class="form-control selectpicker" onchange="appel()" required>
  <option value="" disabled selected>gouvernorat</option>
  <?php
  if($con){
 $req = "SELECT nom_gouvernorat_fr,id_gouvernorat from gouvernorat";
 $result = $con->query($req);
  if ($result->rowCount() > 0) {
  while($row = $result->fetch()) {
   echo  '<option value='.$row['id_gouvernorat'].'>'.$row['nom_gouvernorat_fr'].'</option>'; } } }
                        
   ?>
</select>
</div>
</div>
</div>

<div class="form-group"> 
<label class="col-md-4 control-label">projet</label>
<div class="col-md-4 selectContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
<select name="projet" id="projet" class="form-control selectpicker" required>
  <option value=""disabled selected >projet</option>
</select>
</div>
</div>
</div>

<div class="form-group">
                    <label class="col-md-4 control-label">nombre des images</label>
                    <div class="col-md-4 selectContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
<select name="nbr" class="form-control selectpicker" onchange="restart(this.value)">
  <option value="0" >0</option>
  <option value="1" >1</option>
  <option value="2" >2</option>
  <option value="3" >3</option>
  <option value="4" >4</option>
  <option value="5" >5</option>
                                          </select>
                    </div>
                </div>
                </div>
                <div id="img" ></div>
<script>
  function restart(x){
    var html="";
    for(let i=0;i<x;i++){
      html =html+'<div class="form-group"><label class="col-md-4 control-label">image'+(i+1)+'</label> <div class="col-md-4 inputGroupContainer"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span><input onchange="readURL(this,'+(i+1)+');"  name="image'+(i+1)+'"class="form-control" type="file"accept="image/*"></div> <img id="'+(i+1)+'" src="http://placehold.it/180" /><input type="text" name="i'+(i+1)+'" id="i'+(i+1)+'" > </div></div>'
    }
    document.getElementById('img').innerHTML = html;
  }
  function readURL(input,x) {
    if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#' + x).attr('src', e.target.result);
                    $('#i'+x).val($('#' + x).attr('src'));
                };

                reader.readAsDataURL(input.files[0]);
            }
    }
  </script>
                

<div class="form-group">
                    <label class="col-md-4 control-label">position</label>
                    <div class="col-md-4">
                    <td><div id="map"></div>
                               <div id="limite"></div>
                               <div id="pos"></div>
                    </div>
                </div>



<!-- Button -->
<div class="form-group">
<label class="col-md-4 control-label"></label>
<div class="col-md-4">
<button type="submit" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
</div>
</div>

</fieldset>
</form>
</div>
</div><!-- /.container -->
<script>
      var map, drawingManager, outputPanel;
    function GetMap() {
        outputPanel = document.getElementById('pos');
        outputPanel2 = document.getElementById('limite');
        map = new Microsoft.Maps.Map('#map', {});
        //Load the Drawing Tools and Spatial Math modules.
        Microsoft.Maps.loadModule(['Microsoft.Maps.DrawingTools', 'Microsoft.Maps.SpatialMath'], function () {
            var tools = new Microsoft.Maps.DrawingTools(map);
            tools.showDrawingManager(function (manager) {
                //Store a reference to the drawing manager as it will be useful later.
                drawingManager = manager;
                Microsoft.Maps.Events.addHandler(drawingManager, 'drawingChanging', measureShape);
                Microsoft.Maps.Events.addHandler(drawingManager, 'drawingStarted', measureShape);
            })
        });
    }
    function measureShape(shape) {
        if (shape instanceof Microsoft.Maps.Pushpin) {
          html="coords : ";
          html=html+"<input type='number' name='pinlat' readonly value='"+shape.getLocation().latitude+"'> / ";
    html=html+"<input type='number' name='pinlon' readonly value='"+shape.getLocation().longitude+"'>";
            outputPanel.innerHTML = 'Shape: Pushpin<br/>' +html;
        }
        if (shape instanceof Microsoft.Maps.Polygon && shape.getLocations().length > 3) {
            //Calculate the area of the polygon.
            var area = Microsoft.Maps.SpatialMath.Geometry.area(shape, Microsoft.Maps.SpatialMath.AreaUnits.Acres);
            //Calculate the perimeter of the polygon.
            var perimeter = Microsoft.Maps.SpatialMath.Geometry.calculateLength(shape, Microsoft.Maps.SpatialMath.DistanceUnits.Miles);
            //Round values to 2 decimals. 
            area = Math.round(area * 100) / 100;
            perimeter = Math.round(perimeter * 100) / 100;
            var locs = shape.getLocations();
var html="<br/> coords : <br/>";
//Loop through and display every coordinate in the drawing area
var j=1;
for (i = locs.length - 1; i >= 0; i--) {

    html=html+"<input type='number' name='polylat"+j+"' readonly value='"+locs[i].latitude+"'> / ";
    html=html+"<input type='number' name='polylon"+j+"' readonly value='"+locs[i].longitude+"'><br/>";
    j++;
}
html=html+"nombre des points :<input type='number' name='coordsnum' readonly value='"+j+"'><br/>";
            outputPanel2.innerHTML = 'Shape: Polygon<br/>Area: ' + area + ' Acres</sup><br/>Perimeter: ' + perimeter + ' miles'+html;
        }
    }


    function appel()
  { var y = document.getElementById("projet");
  y.options.length=0;
  option = document.createElement("option");
option.text ="projet" ;
option.disabled = true;
option.selected = true;
y.add(option); 

       var xhttp, xmlDoc,option,id, x, i;
xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
  xmlDoc = this.responseXML;
  x = xmlDoc.getElementsByTagName("rang");
  for (i = 0; i < x.length; i++) {
   option = document.createElement("option");
option.text = "projet "+ x[i].childNodes[0].nodeValue ;
option.disabled = false;
option.selected = false;
y.add(option); 
  }
  }
};
xhttp.open("GET","Ajax_projet.php?tbl2="+gouv.options[gouv.selectedIndex].value, true);
xhttp.send();
  } 
    </script>
    
    <script async defer src="https://www.bing.com/api/maps/mapcontrol?key=ArdlGakFqN4Klb74KLQ7QqoxBFnRGjVVP6hGtc63lj-TSUssubmRe43i0j-VxHv0&callback=GetMap"
                   type="text/javascript"></script>
  </body>
        </html>