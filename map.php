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
        <link rel="stylesheet" type="text/css" href="css/map.css">
        <script src='https://d3js.org/d3.v5.min.js'></script> 
        <script src='https://unpkg.com/topojson@3.0.2/dist/topojson.min.js'></script> 
        <style>
         h1{
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
  text-align: center;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
  text-align: center;
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 50px;
}


/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
        </style>
                <script>
            $(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
                </script>

        <?php
                    session_start();
                    include("connection.php");

                    if (!isset($_SESSION['id'])) { header("location:login.php"); } 
                    
                    $c=0;
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
         <li><a href="http://localhost/priqh2/map.php?data=0">carte </a></li>
         <li><a href="add.php"><b>ajout projet</b></a></li>
         <li><a href="addQphp.php"><b>ajout quartier</b></a></li>
          <li><a href="logout.php"><b>Logout</b></a></li>
        </ul>
        </nav>
      

        <section>
  <!--for demo wrap-->
  <h1>liste des projets</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0">
    <thead>
                                        <tr>
                                          
                                            <th scope="col">rang projet</th>
                                            <th scope="col">nombre quartier</th>
                                            
                                            <th scope="col">nombre maison </th>
                                            <th scope="col">nombre habitant</th>
                                            <th scope="col">assainissement cout</th>
                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php
                        $conn=connect();	
            
                        if($conn){ 
                        $req = "SELECT id_projet,rang_projet,nombre_quartier,nombre_maison,
                        nombre_habitant,assainissement_cout FROM projet";
                        $result = $conn->query($req);
                        if ($result->rowCount() > 0) {
                            while($row = $result->fetch()) {
                    
                                    echo  '<tr>
                                           
                                            <td><b>'. $row['rang_projet'] .'</b></td>
                                            <td><b>'. $row['nombre_quartier'] .'</b></td>
                                            <td><b>'. $row['nombre_maison'] .'</b></td>
                                            <td><b>'.  $row['nombre_habitant'] .'</b></td>
                                            <td><b>'. $row['assainissement_cout'] .'</b></td>
                                            
                                            </tr>';
                                            }
                                            }
                                            } ?>
                                            
                                    </tbody>
    </table>
  </div>
</section>
  </body>
        </html>