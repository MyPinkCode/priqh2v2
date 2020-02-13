<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>carte des projets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="source/icon.png">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/geo.css">
       
        <style>
       #map {
          height:600px;
          width: 80%;
          margin: 10%;
          border-radius: 100px;
        margin:50px;
        border:2px solid white;
        }
       
      </style>


  <?php
	session_start();
	include("connection.php");

  if (!isset($_SESSION['id'])) { header("location:login.php"); } 
	
?>
  </head>

  <body>
 
        <input type="checkbox" class="check" id="checked">
        <label class="menu-btn" for="checked">
          <span class="bar top"></span>
          <span class="bar middle"></span>
          <span class="bar bottom"></span>
          <span class="menu-btn__text"></span>
        </label>
        <label class="close-menu" for="checked"></label>
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
        <div id="map"></div>
 
        <script>
      

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(36.87, 10.11),
          zoom: 9
        });
        var infoWindow = new google.maps.InfoWindow;

          
          downloadUrl('http://localhost/priqh2/exporter.php?data=<?php echo $_GET['data']; ?>', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('projet');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id_projet = markerElem.getAttribute('id_projet');  
			  var rang_projet = markerElem.getAttribute('rang_projet');
                 var id_municipalite = markerElem.getAttribute('id_municipalite');
			   
			    var id_gouvernorat = markerElem.getAttribute('id_gouvernorat');
			  var id_commune = markerElem.getAttribute('id_commune');
              var composante_projet = markerElem.getAttribute('composante_projet');
              var type = markerElem.getAttribute('type');
			  var nombre_maison = markerElem.getAttribute('nombre_maison');
			  var nombre_habitant = markerElem.getAttribute('nombre_habitant');
			  var superficie_quartier_couvert = markerElem.getAttribute('superficie_quartier_couvert');
			  var cout_total = markerElem.getAttribute('cout_total');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

                  var infowincontent = document.createElement('div');
             var html = '<div style="text-align:center; color:#FF0000;"><font size="6">projet '
              + rang_projet +'<br>"'+id_gouvernorat+'"<br>"'+id_commune+'"<br>"'+id_municipalite
              +'"<br><br></font></div><div style="text-align:right; color:#104E8B;"><font size="5"> '
              +composante_projet+'<br> '+nombre_maison+'<br> '+nombre_habitant+'<br> '
              +superficie_quartier_couvert+'<br><br><big></font></div><div style="text-align:right; color:#FF0000;"><font size="6"> '+cout_total+'</big></font></div>';
                 
			 
               downloadUrl('http://localhost/priqh2/quartier.php?id_projet='+id_projet, function(data) {
            var xml = data.responseXML;
            var quartiers = xml.documentElement.getElementsByTagName('quartier');
			Array.prototype.forEach.call(quartiers, function(markerElem) {
			var id_quartier = markerElem.getAttribute('id_quartier');
			var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));
				  var image1 = markerElem.getAttribute('image1');
				 var image2 = markerElem.getAttribute('image2');
				 var image3 = markerElem.getAttribute('image3');
				 var image4 = markerElem.getAttribute('image4');
         var image5 = markerElem.getAttribute('image5');
			var id_projet = markerElem.getAttribute('id_projet');  
			var nom_quartier = markerElem.getAttribute('nom_quartier'); 
			var rang_projet = markerElem.getAttribute('rang_projet'); 			

     var html3=html+ '<p align="center"><IMG SRC="' + image1 + '"/><IMG SRC="' + image2 + '"/><IMG SRC="' + image3 + '"/><IMG SRC="' + image4 + '"/></p>';
		   var customLabel = {
        restaurant: {
          label: 'R',
		       },
        bar: {
          label: 'B'
        },
		 projet: {
          label: 'P'
        }
      };
					  var icon = customLabel[type] || {};		
			var projet = new google.maps.Marker({
                map: map,
                position: point,       
			label: icon.label + rang_projet
			
              });
              
 		   
			
 downloadUrl('http://localhost/priqh2/limite_quartier.php?id_quartier='+id_quartier, function(data) {
    
		var html1 = '<div style="text-align:center; color:#FF0000;"><font size="2">"projet' + rang_projet +'"<br>"'+id_gouvernorat+'"<br>"'+id_commune+'"<br>"Quartier :'+nom_quartier+'"</font></div>';
	    var xml = data.responseXML;
            var points = xml.documentElement.getElementsByTagName('point');
			var polyCoords1 = [];
            Array.prototype.forEach.call(points, function(markerElem) {
 var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));
 polyCoords1.push(point);
});

    var poly = new google.maps.Polygon({
        paths:polyCoords1,
        strokeColor: "#FF0000",
        strokeOpacity: 0.3,
        strokeWeight: 2,
        fillColor: "#FF0000",
        fillOpacity: 0.3
    });
    poly.setMap(map);
	projet.addListener('click', function() {
                infoWindow.setContent(html3);
                infoWindow.open(map, projet);	
              });

	
			  
			  poly.addListener('mouseover', function() {
                infoWindow.setContent(html1);
                infoWindow.open(map, projet);	
              });
});				  
});	
});
});
  });
  var controlMarkerUI = document.createElement('DIV');
      controlMarkerUI.style.cursor = 'pointer';
      controlMarkerUI.style.backgroundImage = "url(source/icons8-waypoint-map-64.png)";
      controlMarkerUI.style.height = '64px';
      controlMarkerUI.style.width = '64px';
      controlMarkerUI.style.top = '11px';
      controlMarkerUI.style.left = '120px';
      controlMarkerUI.title = 'ajouter quartier';
      controlMarkerUI.onclick = function() {
        location.replace("http://localhost/priqh2/addQphp");}
      //myLocationControlDiv.appendChild(controlUI);

      map.controls[google.maps.ControlPosition.TOP_CENTER].push(controlMarkerUI);
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    
                   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsbCCa-zupmnCE270eRl_VGErr3aVN6YA&callback=initMap"
                   type="text/javascript"></script>
       
  </body>
        </html>