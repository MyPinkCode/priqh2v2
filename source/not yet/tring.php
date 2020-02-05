<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>ARRU</title>
            <link rel="icon" href="source/avatar.png" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/templatemo-style.css">
    <style>
       #map {
          height: 600px;
          width: 1250px;
          margin-left: 100px;
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

  <body id="reportsPage">

  <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
            <a class="navbar-brand" href="index.php">
                    <h1 class="tm-site-title mb-0">Gestion des projets -ARRU-</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                    <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                home <i class="fa fa-home"></i>
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="geo.php">
                            geolocalisation <i class="fa fa-map-marked-alt"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/ARRU/map.php?data=0">
                            carte <i class="fa fa-map-signs"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="logout.php">
                            <b>Logout</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

 </nav>

  <div id="map"></div>
  <script>
                    
  var map, infoWindow;
function initMap() {
                      var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: {lat: 36.87, lng: 10.11}
  });

    setMarkers(map);
}

  // Data for the markers consisting of a name, a LatLng and a zIndex for the
  // order in which these markers should display on top of each other.
  var projets = [
    <?php
                $conn=connect();	
	
                if($conn){ 
                  $req = "SELECT nom_quartier,lat,lng FROM qaurtier";
                  $result = $conn->query($req);
                  if ($result->rowCount() > 0) {
                    while($row = $result->fetch()) {
               
                              echo  '
      ["'. $row['nom_quartier'] .'", '. $row['lat'] .', '. $row['lng'] .'],
           ';
                                    }
                                    }
                                    } ?>
 ];
   
 var citymap = {
      <?php
                if($conn){ 
                  $req0 = "SELECT distinct id_quartier FROM limite_quartier";
                  $result0 = $conn->query($req0);
                  if ($result0->rowCount() > 0) {
                    while($row = $result0->fetch()) {
            echo $row['id_quartier'].': {';
     $req = "SELECT id_quartier,lat,lng,id_limite_quartier FROM limite_quartier where id_quartier=".$row['id_quartier'];
                  $result = $conn->query($req);
                  if ($result->rowCount() > 0) {
                    while($row = $result->fetch()) {
               
                              echo  '
                          position'.$row['id_limite_quartier'].' : {lat:'.$row['lat'].', lng:'.$row['lng'].'},
      ';
                                    }
                                    }
                                echo ' },';   
                                    }
                                    
                                    }
                                    }
                                     ?>
 };
        
    
  function setMarkers(map) {
   
    var image = {
      src: 'source/here.png',
      // This marker is 20 pixels wide by 32 pixels high.
      size: new google.maps.Size(16, 24),
      // The origin for this image is (0, 0).
      origin: new google.maps.Point(0, 0),
      // The anchor for this image is the base of the flagpole at (0, 32).
      anchor: new google.maps.Point(0, 32)
    };
    
    var shape = {
      coords: [1, 1, 1, 20, 18, 20, 18, 1],
      type: 'poly'
    };
    for (var i = 0; i < projets.length; i++) {
      var beach = projets[i];
      var marker = new google.maps.Marker({
        position: {lat: beach[1], lng: beach[2]},
        map: map,
        icon: image,
        shape: shape,
        title: beach[0]
      });
    }
 
   
   for (var city in citymap) {
          // Add the circle for this city to the map.
          var cityCircle = new google.maps.PolygonOptions({
            paths: citymap[city],
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map
  });
        }
  }
  //add deleate projects
  //https://developers-dot-devsite-v2-prod.appspot.com/maps/documentation/javascript/examples/drawing-tools
  </script>
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsbCCa-zupmnCE270eRl_VGErr3aVN6YA&callback=initMap" type="text/javascript"></script>
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
      <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2019</b> All rights reserved. 
                    
                </p>
      </div>
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
  </body>
</html>