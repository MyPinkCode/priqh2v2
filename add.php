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
        <style>
       #map {
          width: 70%;height:600px;border-radius: 100px;
        border:2px solid white;margin:5px;
        }
        .cont{width:100%;}
        .well{width:100%;} 
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
         <li><a href="http://localhost/priqh2/map.php?data=0">carte </a></li>
         <li><a href="add.php"><b>ajout projet</b></a></li>
         <li><a href="addQphp.php"><b>ajout quartier</b></a></li>
          <li><a href="logout.php"><b>Logout</b></a></li>
        </ul>
        </nav>
        <div class="cont">

<form class="well form-horizontal" id="contact_form" method="post" action="createProjet.php">
<fieldset>

<!-- Form Name -->
<legend>Ajout projet</legend>

<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label">rang projet</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
<input  name="rang" type="number" placeholder="rang projet" class="form-control" required>
</div>
</div>
</div>

<!-- Select Basic -->

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
<label class="col-md-4 control-label">commune</label>
<div class="col-md-4 selectContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
<select name="com" id="com" class="form-control selectpicker" onchange="appel1()" required>
  <option value=""disabled selected >commune</option>
</select>
</div>
</div>
</div>

<div class="form-group"> 
<label class="col-md-4 control-label">municipalite</label>
<div class="col-md-4 selectContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
<select name="mun" id="mun"class="form-control selectpicker" required>
  <option value=""disabled selected >municipalite</option>
</select>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">nombre quartier</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
<input name="q" type="number" placeholder="nombre quartier" class="form-control">
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">nombre maison</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
<input name="m" type="number" placeholder="nombre maison" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">nombre habitant</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="h" type="number" placeholder="nombre habitant" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">assainissement cout</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
<input  name="c" type="number" placeholder="assainissement cout" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">superficie quartier</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
<input  name="superficie_quartier_couvert" type="number" placeholder="superficie quartier" class="form-control" >
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label">rapport superificie</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
<input name="rapport_superificie" type="number" placeholder="rapport superificie" class="form-control" >
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label">taux habitation</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
<input name="taux_habitation" type="number" placeholder="taux habitation" class="form-control" >
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label">superficie quartier couvert</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-fullscreen"></i></span>
<input name="superficie_quartier_couvert" type="number" placeholder="superficie quartier couvert" class="form-control" >
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label">taux habitation</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
<input name="taux_habitation" type="number" placeholder="taux habitation" class="form-control" >
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label">rapport depense maison</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
<input name="rapport_depense_maison" type="number" placeholder="rapport depense maison" class="form-control" >
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label">composante projet</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
      <textarea class="form-control" name="comment"style="margin:0" placeholder="composante projet"></textarea>
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label">assainissement qte</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
<input name="assainissement_qte" type="number" placeholder="assainissement qte" class="form-control" >
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label">assainissement taux</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
<input name="assainissement_taux" type="number" placeholder="assainissement taux" class="form-control" >
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label">eclairage public qte</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
<input name="eclairage_public_qte" type="number" placeholder="eclairage public qte" class="form-control" >
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label">eclairage public cout</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
<input name="eclairage_public_cout" type="number" placeholder="eclairage public cout" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">eclairage public taux</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-certificate"></i></span>
<input name="eclairage_public_taux" type="number" placeholder="eclairage public taux" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">voirie qte</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
<input name="voirie_qte" type="number" placeholder="voirie qte" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">voirie cout</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
<input name="voirie_cout" type="number" placeholder="voirie cout" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">voirie taux</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
<input name="voirie_taux" type="number" placeholder="voirie taux" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">eau potable qte</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="	glyphicon glyphicon-tint"></i></span>
<input name="eau_potable_qte" type="number" placeholder="eau potable qte" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">eau potable cout</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
<input name="eau_potable_cout" type="number" placeholder="eau potable cout" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">eau potable taux</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
<input name="eau_potable_taux" type="number" placeholder="eau potable taux" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">drainage qte</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-adjust"></i></span>
<input name="drainage_qte" type="number" placeholder="drainage qte" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">drainage cout</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
<input name="drainage_cout" type="number" placeholder="drainage cout" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">drainage taux</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
<input name="drainage_taux" type="number" placeholder="drainage taux" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">amel habitat qte</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-hand-right"></i></span>
<input name="amel_habitat_qte" type="number" placeholder="amel habitat qte" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">amel habitat cout</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
<input name="amel_habitat_cout" type="number" placeholder="amel habitat cout" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">socio collectif cout</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
<input name="socio_collectif_cout" type="number" placeholder="socio collectif cout" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">industriel cout</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
<input name="industriel_cout" type="number" placeholder="industriel cout" class="form-control" >
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">cout total</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
<input name="cout_total" type="number" placeholder="cout total" class="form-control" >
</div>
</div>
</div>
<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label">type</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="	glyphicon glyphicon-folder-close"></i></span>
<input name="type" placeholder="type" class="form-control"  type="text" >
</div>
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

function appel()
  { var y = document.getElementById("com");
  y.options.length=0;
  option = document.createElement("option");
option.text ="commune" ;
option.disabled = true;
option.selected = true;
y.add(option); 

var z = document.getElementById("mun");
  z.options.length=0;
  o = document.createElement("option");
o.text ="municipalite" ;
o.disabled = true;
o.selected = true;
z.add(o);

       var xhttp, xmlDoc,option,id, x, i;
xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
  xmlDoc = this.responseXML;
  x = xmlDoc.getElementsByTagName("nom_commune_fr");
  id = xmlDoc.getElementsByTagName("id_commune");
  for (i = 0; i < x.length; i++) {
   option = document.createElement("option");
option.text =x[i].childNodes[0].nodeValue ;
option.value=id[i].childNodes[0].nodeValue;
option.disabled = false;
option.selected = false;
y.add(option); 
  }
  }
};
xhttp.open("GET","Ajax_commune.php?tbl2="+gouv.options[gouv.selectedIndex].value, true);
xhttp.send();
  } 	



  function appel1()
  { var y = document.getElementById("mun");
  y.options.length=0;
  option = document.createElement("option");
option.text ="municipalite" ;
option.disabled = true;
option.selected = true;
y.add(option); 
       var xhttp, xmlDoc,option,id, x, i;
xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
  xmlDoc = this.responseXML;
  x = xmlDoc.getElementsByTagName("nom_municipalite_fr");
  id = xmlDoc.getElementsByTagName("id_municipalite");
  for (i = 0; i < x.length; i++) {
   option = document.createElement("option");
option.text =x[i].childNodes[0].nodeValue ;
option.value=id[i].childNodes[0].nodeValue;
option.disabled =false;
option.selected = false;
y.add(option); 
  }
  }
};
xhttp.open("GET","Ajax_municipalite.php?tbl2="+com.options[com.selectedIndex].value, true);
xhttp.send();
  } 
</script>
 
       
  </body>
        </html>