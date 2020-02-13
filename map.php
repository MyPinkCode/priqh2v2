<!DOCTYPE html>
        <html lang="en">
 <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>priqh2</title>
            <link rel="icon" href="source/icon.png">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
            
            <link rel="stylesheet" href="css2/fontawesome.min.css">
            
            <link rel="stylesheet" href="css2/bootstrap.min.css">
            <?php
                    session_start();
                    include("connection.php");

                    if (!isset($_SESSION['id'])) { header("location:login.php"); } 
                    
                    $c=0;
                ?>
            <link rel="stylesheet" href="css2/templatemo-style.css">
    <style>
       .table{text-align : center}
            .container{ display: flex;margin-left:0px}
            td b{ display: flex}
            #all{margin-left: 100px}
            td i{font-size:16px;margin:5px}
            th i{font-size:20px}
         /* Full-width input fields */
        input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        }

        button:hover {
        opacity: 0.8;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
        }

        /* Center the image and position the close button */
        .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
        }

        img.avatar {
        width: 40%;
        border-radius: 50%;
        }

        .container {
        padding: 16px;
        }

        span.psw {
        float: right;
        padding-top: 16px;
        }

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        padding-top: 60px;
        }

        /* Modal Content/Box */
        .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button (x) */
        .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: red;
        cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
        from {-webkit-transform: scale(0)} 
        to {-webkit-transform: scale(1)}
        }
        
        @keyframes animatezoom {
        from {transform: scale(0)} 
        to {transform: scale(1)}
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
        }
        
        .drawer-menu {
          box-sizing: border-box;
          position: fixed;
          top: 0;
          right: 0;
          width: 300px;
          height: 100%;
          padding: 120px 0;
          background: #222;
          -webkit-transition-property: all;
          transition-property: all;
          -webkit-transition-duration: .5s;
          transition-duration: .5s;
          -webkit-transition-delay: 0s;
          transition-delay: 0s;
          -webkit-transform-origin: right center;
          -ms-transform-origin: right center;
          transform-origin: right center;
          -webkit-transform: perspective(500px) rotateY(-90deg);
          transform: perspective(500px) rotateY(-90deg);
          opacity: 0;
          box-shadow: 0px 0px 5px #1E1E1E;
        }

        .drawer-menu li {
          text-align: center;
        }

        .drawer-menu li a {
          display: block;
          height: 50px;
          line-height: 50px;
          font-size: 14px;
          color: #fff;
          -webkit-transition: all .8s;
          transition: all .8s;
        }

        .drawer-menu li a:hover {
          color: #1a1e24;
          background: #96908D;
        }


        /* checkbox */

        .check {
          display: none;
        }

        .menu-btn {
          position: fixed;
          display: block;
          top: 28px;
          right: 40px;
          display: block;
          width: 20px;
          height: 40px;
          font-size: 10px;
          text-align: center;
          cursor: pointer;
          z-index: 3;
        }

        .bar {
          position: absolute;
          top: 0;
          left: 0;
          display: block;
          width: 40px;
          height: 1px;
          background: white;
          -webkit-transition: all .5s;
          transition: all .5s;
          -webkit-transform-origin: left top;
          -ms-transform-origin: left top;
          transform-origin: left top;
        }

        .bar.middle {
          top: 12px;
          opacity: 1;
        }

        .bar.bottom {
          top: 24px;
          -webkit-transform-origin: left bottom;
          -ms-transform-origin: left bottom;
          transform-origin: left bottom;
        }

        .menu-btn__text {
          position: absolute;
          bottom: -15px;
          left: 0;
          right: 0;
          margin: auto;
          color: #fff;
          -webkit-transition: all .5s;
          transition: all .5s;
          display: block;
          visibility: visible;
          opacity: 1;
        }


        /* Hover Effects */

        .menu-btn:hover .bar {
          background: white;
        }

        .menu-btn:hover .menu-btn__text {
          color: #999;
        }

        .close-menu {
          position: fixed;
          top: 0;
          right: 300px;
          width: 100%;
          height: 100vh;
          background: rgba(0, 0, 0, 0);
          -webkit-transition-property: all;
          transition-property: all;
          -webkit-transition-duration: .3s;
          transition-duration: .3s;
          -webkit-transition-delay: 0s;
          transition-delay: 0s;
          visibility: hidden;
          opacity: 0;
        }


        /* checked */

        .check:checked ~ .drawer-menu {
          -webkit-transition-delay: .3s;
          transition-delay: .3s;
          -webkit-transform: none;
          -ms-transform: none;
          transform: none;
          opacity: 1;
          z-index: 2;
        }

        .check:checked ~ .contents {
          -webkit-transition-delay: 0s;
          transition-delay: 0s;
          -webkit-transform: translateX(-300px);
          -ms-transform: translateX(-300px);
          transform: translateX(-300px);
        }

        .check:checked ~ .menu-btn .menu-btn__text {
          visibility: hidden;
          opacity: 0;
        }

        .check:checked ~ .menu-btn .bar.top {
          width: 56px;
          -webkit-transform: rotate(45deg);
          -ms-transform: rotate(45deg);
          transform: rotate(45deg);
        }

        .check:checked ~ .menu-btn .bar.middle {
          opacity: 0;
        }

        .check:checked ~ .menu-btn .bar.bottom {
          width: 56px;
          top: 40px;
          -webkit-transform: rotate(-45deg);
          -ms-transform: rotate(-45deg);
          transform: rotate(-45deg);
        }

        .check:checked ~ .close-menu {
          -webkit-transition-duration: 1s;
          transition-duration: 1s;
          -webkit-transition-delay: .3s;
          transition-delay: .3s;
          background: rgba(0, 0, 0, .5);
          visibility: visible;
          opacity: 1;
          z-index: 3;
        }

       .navbar h1 {
          display: inline-block;
          color: whitesmoke;
          text-transform: uppercase;
          letter-spacing: 0.02em;
          text-transform: uppercase;
          font-size: 1.5em;
          margin: 0;
          font-weight: lighter;
          padding: 1em 0 0 1em;
        }

        a {
          text-decoration: none;
          text-transform: uppercase;
          font-size: 7em;
          font-family: arial;
          letter-spacing: .3em;
        }

        ul {
          margin: 0;
          padding: 0;
          list-style: none;
          text-decoration: none;
        }

</style>
                   
 <script>
            function color(i,n){
                if(n==1){i.style.color="#f5a623";}
                else {i.style.color="white";}
            }
                function supprime(s){
                    if (confirm("Voulez-vous supprimer ce projet ?")) {
                    document.getElementById('data').value=s;
                    document.getElementById('form').action="supp.php";
                         document.getElementById('form').submit();}
                }
                function modifier(s){
                    document.getElementById('data').value=s;
                    document.getElementById('form').action="modif.php";
                         document.getElementById('form').submit();
                }
                function ajout(){
                    x=<?php echo $_GET['data'] ;?>;
                    location.replace("http://localhost/priqh2/add.php?data="+x+"&com=<?php echo $_GET['com']; ?>");
                }
                function ajouter(){
                    document.getElementById('id01').style.display="block";
                }
                function modgov(){
                    document.getElementById('id02').style.display="block";
                }
                function modcom(){
                    document.getElementById('id03').style.display="block";
                }
                function addgov(){
                    document.getElementById('id04').style.display="block";
                }
                </script>
</head>

<body id="reportsPage">

     <form method="get" id="form" action="" style="display:none"> 
        <input type="text" name="data"id="data" > 
    </form> 
 <!--navbar-->
 <nav class="navbar navbar-expand-xl">
                    <h1 class="tm-site-title mb-0">Gestion des projets -ARRU-</h1>
    <input type="checkbox" class="check" id="checked">
        <label class="menu-btn" for="checked">
          <span class="bar top"></span>
          <span class="bar middle"></span>
          <span class="bar bottom"></span>
          <span class="menu-btn__text"></span>
        </label>
        <label class="close-menu" for="checked" ></label>
        <nav class="drawer-menu">
        <ul>
         <li> <a href="index.php"> home</a></li>
         <li><a href="http://localhost/priqh2/geo.php?data=<?php echo $_GET['data']; ?>&com=<?php echo $_GET['com']; ?>">geolocalisation </a></li>
         <li><a href="http://localhost/priqh2/map.php?data=0&com=0">carte </a></li>
         <li><a href="http://localhost/priqh2/add.php?data=<?php echo $_GET['data']; ?>&com=<?php echo $_GET['com']; ?>"><b>ajout projet</b></a></li>
         <li><a href="addQphp.php"><b>ajout quartier</b></a></li>
          <li><a href="logout.php"><b>Logout</b></a></li>
        </ul>
        </nav>     
</nav>  
            <div class="container">
            <!--carte tun-->
 <div id="map">
                    <img src="source/tun.png" usemap="#tunMap">
                    <map name="tunMap">
                        <area target="" alt="bizerte" title="bizerte" coords="121,23,166,8,197,21,181,40,173,38,144,55" shape="poly" href="http://localhost/priqh2/map.php?data=8&com=0">
                        <area target="" alt="ariana" title="ariana" coords="184,42,200,25,208,44,190,51" shape="poly" href="http://localhost/priqh2/map.php?data=5&com=0">
                        <area target="" alt="tunis" title="tunis" coords="190,52,189,63,207,57,210,42" shape="poly" href="http://localhost/priqh2/map.php?data=1&com=0">
                        <area target="" alt="manouba" title="manouba" coords="151,52,174,42,186,52,178,71" shape="poly" href="http://localhost/priqh2/map.php?data=15&com=0">
                        <area target="" alt="ben arous" title="ben arous" coords="180,69,207,58,209,83" shape="poly" href="http://localhost/priqh2/map.php?data=7&com=0">
                        <area target="" alt="nabeul" title="nabeul" coords="207,85,214,62,256,29,263,43,243,81,225,90" shape="poly" href="http://localhost/priqh2/map.php?data=18&com=0">
                        <area target="" alt="beja" title="beja" coords="108,35,122,26,143,59,150,55,174,72,164,84,152,83,139,90,122,83" shape="poly" href="http://localhost/priqh2/map.php?data=6&com=0">
                        <area target="" alt="jandouba" title="jandouba" coords="61,75,93,42,108,38,119,84,73,90" shape="poly" href="http://localhost/priqh2/map.php?data=9&com=0">
                        <area target="" alt="kef" title="kef" coords="68,121,70,91,113,89,130,116,115,141,93,134,87,146,68,149" shape="poly" href="http://localhost/priqh2/map.php?data=13&com=0">
                        <area target="" alt="siliana" title="siliana" coords="116,86,138,91,168,83,156,99,165,110,151,125,151,140,138,143,150,162,138,161,119,146,130,116" shape="poly" href="http://localhost/priqh2/map.php?data=20&com=0">
                        <area target="" alt="zaghoan" title="zaghoan" coords="159,97,173,75,205,82,209,98,188,118,170,111" shape="poly" href="http://localhost/priqh2/map.php?data=24&com=0">
                        <area target="" alt="soussa" title="soussa" coords="209,89,220,89,231,136,215,161,195,135,204,123,200,113,212,97" shape="poly" href="http://localhost/priqh2/map.php?data=21&com=0">
                        <area target="" alt="mounastir" title="mounastir" coords="221,160,233,138,257,145,254,154,241,166" shape="poly" href="http://localhost/priqh2/map.php?data=17&com=0">
                        <area target="" alt="kasrine" title="kasrine" coords="71,150,67,219,85,229,113,218,125,201,134,199,135,186,125,176,137,161,119,147,98,139" shape="poly" href="http://localhost/priqh2/map.php?data=11&com=0">
                        <area target="" alt="keroan" title="Kairouan" coords="156,123,173,115,187,122,196,115,194,130,203,150,198,169,200,188,190,197,183,187,151,175,144,145,156,138" shape="poly" href="http://localhost/priqh2/map.php?data=10&com=0">
                        <area target="" alt="mahdia" title="mahdia" coords="202,190,201,174,205,157,241,166,255,157,263,178,253,192,230,180,221,190" shape="poly" href="http://localhost/priqh2/map.php?data=14&com=0">
                        <area target="" alt="sidi bouzid" title="sidi bouzid" coords="128,173,144,162,147,176,183,190,187,204,169,233,188,241,163,256,156,263,147,247,135,230,106,222,124,204,138,198" shape="poly" href="http://localhost/priqh2/map.php?data=19&com=0">
                        <area target="" alt="sfax" title="sfax" coords="174,232,199,191,214,195,228,184,254,194,236,230,186,269,166,260,191,241" shape="poly" href="http://localhost/priqh2/map.php?data=4&com=0">
                        <area target="" alt="sfax" title="sfax" coords="261,230,268,211,276,222" shape="poly" href="http://localhost/priqh2/map.php?data=4&com=0">
                        <area target="" alt="gafsa" title="gafsa" coords="68,224,57,240,59,250,52,257,71,274,115,275,121,268,152,263,140,242,132,230,104,224,89,230" shape="poly" href="http://localhost/priqh2/map.php?data=3&com=0">
                        <area target="" alt="tozeur" title="tozeur" coords="55,241,15,279,28,330,93,282,74,277,47,258" shape="poly" href="http://localhost/priqh2/map.php?data=23&com=0">
                        <area target="" alt="kbeli" title="kbeli" coords="29,333,96,279,135,268,135,298,155,319,154,334,179,353,180,376,183,396,164,382,74,403" shape="poly" href="http://localhost/priqh2/map.php?data=12&com=0">
                        <area target="" alt="gabes" title="gabes" coords="141,267,160,263,184,271,216,311,192,335,171,340,156,326,156,314,142,303" shape="poly" href="http://localhost/priqh2/map.php?data=2&com=0">
                        <area target="" alt="tataouin" title="tataouin" coords="74,406,165,385,184,399,185,370,182,363,225,346,256,366,262,392,277,405,263,427,221,469,208,470,194,492,206,539,180,580,157,589,122,441" shape="poly" href="http://localhost/priqh2/map.php?data=22&com=0">
                        <area target="" alt="mednine" title="mednine" coords="171,342,180,350,182,358,219,344,259,361,264,387,281,407,267,425,292,411,291,357,259,303,219,311,208,332,188,341" shape="poly" href="http://localhost/priqh2/map.php?data=16&com=0">
                    </map>
        
        </div>
    <div id="all">
                <table class="table">
                                    <thead>
                                        <tr>
                                          
                                            <th scope="col">rang projet</th>
                                            <th scope="col">nombre quartier</th>
                                            
                                            <th scope="col">nombre maison </th>
                                            <th scope="col">nombre habitant</th>
                                            <th scope="col">assainissement cout</th>
                                            <th scope="col">
                                                <i class="fas fa-database" onmouseover="color(this,1)"
                                                onmouseout="color(this,2)"
                                                 title="ajouter un projet" onClick="ajout()">

                                                </i>
                                            </th>
                                
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
                                            <td><b>
                                            <i class="fas fa-trash" title="supprimer" onClick="supprime('. $row['id_projet'] .')"onmouseover="color(this,1)"
                                            onmouseout="color(this,2)"></i>
                                            <i class="fa fa-pen" title="modifier" onClick="modifier('. $row['id_projet'] .')"onmouseover="color(this,1)"
                                            onmouseout="color(this,2)"></i>
                                            </b></td>
                                            
                                            </tr>';
                                            }
                                            }
                                            } ?>
                                            
                                    </tbody>
                                </table>
 </div> 

              <!--carte gov-->
 <div style="margin-left:150px" style="position:relative">
             <?php
                       
            
                        if($conn){ 
                            if($_GET['data']!=0){
                           
                            $r= $_GET['data'];
                           
                            echo '<script>document.getElementById("all").style.display="none";</script>';
                            $req ="SELECT g.nom_gouvernorat_fr,p.id_projet,p.rang_projet,p.nombre_quartier,p.nombre_maison,p.nombre_habitant,p.assainissement_cout 
                            FROM projet p,gouvernorat g where p.id_gouvernorat=g.id_gouvernorat and  g.id_gouvernorat= '" .$r."'";
                            $result = $conn->query($req);
                        $result = $conn->query($req);
                        echo '
                            
                             <table class="table" id="gov">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">rang projet</th>
                                   
                                    <th scope="col">nombre quartier</th>
                                    
                                    <th scope="col">nombre maison </th>
                                    <th scope="col">nombre habitant</th>
                                    <th scope="col">assainissement cout</th>
                                    <th scope="col"><i class="fas fa-database" onmouseover="color(this,1)"
                                    onmouseout="color(this,2)" title="ajouter un projet" onClick="ajout()"></i></th>
                                    
                        
                                </tr>
                            </thead>
                            <tbody>';
                        if ($result->rowCount() > 0) {
                            while($row = $result->fetch()) {
                                $img=$row['nom_gouvernorat_fr'];
                                    echo  '<tr>
                                          
                                            <td><b>#'. $row['rang_projet'] .'</b></td>
                                          
                                            <td><b>'. $row['nombre_quartier'] .'</b></td>
                                            <td><b>'. $row['nombre_maison'] .'</b></td>
                                            <td><b>'.  $row['nombre_habitant'] .'</b></td>
                                            <td><b>'. $row['assainissement_cout'] .'</b></td>
                                            <td><b>
                                            <i class="fas fa-trash" title="supprimer" onClick="supprime('. $row['id_projet'] .')"onmouseover="color(this,1)"
                                            onmouseout="color(this,2)"></i>
                                            <i class="fa fa-pen" title="modifier" onClick="modifier('. $row['id_projet'] .')"onmouseover="color(this,1)"
                                            onmouseout="color(this,2)"></i>
                                            </b></td>
                                            </tr>';
                                            }
                                            echo '<img src="source/'.$img.'.png" usemap="#gouv"> <map name="gouv">';
                                            switch($r){
                                                //24 case xo 
                                                case 1 :echo '
                                                <area target="" alt="la marsa" title="la marsa" href="http://localhost/priqh2/map.php?data=1&com=2" coords="327,35,335,21,417,61,453,121,415,145,390,148,360,130,378,88" shape="poly">
                                                <area target="" alt="carthage" title="carthage" onclick="ajouter()" coords="392,155,453,128,460,140,428,190,409,172,397,179,382,177,404,164" shape="poly">
                                                <area target="" alt="la goulette" title="la goulette" onclick="ajouter()" coords="384,179,381,192,398,193,403,207,393,216,372,218,380,228,369,231,368,242,360,241,358,233,335,236,345,239,343,252,367,252,391,232,411,233,423,190,414,175" shape="poly">
                                                <area target="" alt="el bouhaira" title="el bouhaira" onclick="ajouter()" coords="317,151,337,179,377,179,397,163,390,149,370,142" shape="poly">
                                                <area target="" alt="lac" title="lac" onclick="ajouter()" coords="379,185,341,181,303,201,284,200,251,237,273,280,296,265,347,288,338,256,310,247,351,231,368,222,394,208,381,197" shape="poly">
                                                <area target="" alt="cite el khadhra" title="cite el khadhra" onclick="ajouter()" coords="307,138,277,171,248,170,236,217,258,217,281,197,298,197,332,180" shape="poly">
                                                <area target="" alt="el manzah" title="el manzah" onclick="ajouter()" coords="193,167,201,209,211,198,228,201,234,216,244,175" shape="poly">
                                                <area target="" alt="el omrane superieur" title="el omrane superieur" onclick="ajouter()" coords="188,164,155,181,160,197,198,210" shape="poly">
                                                <area target="" alt="cite etahrir" title="cite etahrir" onclick="ajouter()" coords="160,208,161,199,189,208,189,221" shape="poly">
                                                <area target="" alt="bardo" title="bardo" onclick="ajouter()" coords="158,206,168,249,209,248,203,238,209,228" shape="poly">
                                                <area target="" alt="el omrane" title="el omrane" onclick="ajouter()" coords="194,216,217,203,237,222,215,231" shape="poly">
                                                <area target="" alt="bab bhar" title="bab bhar" onclick="ajouter()" coords="239,227,255,221,262,266,245,253" shape="poly">
                                                <area target="" alt="sokra" title="sokra" onclick="ajouter()" coords="209,234,235,230,235,238,223,243,210,243" shape="poly">
                                                <area target="" alt="medina" title="medina" onclick="ajouter()" coords="222,254,224,242,236,241,242,253,232,256" shape="poly">
                                                <area target="" alt="sidi el bachir" title="sidi el bachir" onclick="ajouter()" coords="224,259,243,253,254,267,240,281" shape="poly">
                                                <area target="" alt="sijoumi" title="sijoumi" onclick="ajouter()" coords="210,245,209,259,230,287,238,280,219,245" shape="poly">
                                                <area target="" alt="jbal jloud" title="jbal jloud" onclick="ajouter()" coords="268,276,263,292,274,314,282,308,280,278" shape="poly">
                                                <area target="" alt="kabaria" title="kabaria" onclick="ajouter()" coords="263,301,254,306,266,342,277,318" shape="poly">
                                                <area target="" alt="el ourdia" title="el ourdia" onclick="ajouter()" coords="254,308,262,297,264,276,253,277,228,290,242,350,223,360,248,376,267,344" shape="poly">
                                                <area target="" alt="ezzouhour" title="ezzouhour" onclick="ajouter()" coords="165,249,184,271,203,259,207,248" shape="poly">
                                                <area target="" alt="el hararia" title="el hararia" onclick="ajouter()" coords="178,266,162,250,162,259,142,248,96,262,102,269,84,281,68,256,40,253,16,270,46,308,92,288,124,287" shape="poly">
                                                <area target="" alt="sidi hassine" title="sidi hassine" href="http://localhost/priqh2/map.php?data=1&com=1" coords="184,270,119,291,94,289,45,311,51,344,110,374,105,395,128,414,171,400,189,343,160,312,162,285" shape="poly">
                                            </map><i class="fas fa-street-view" style="color:red;position:absolute;left:204px;top:154px" onclick="modgov()"></i>';break;
                                            case 2 :echo '
                                            <area target="" alt="manzel el habib" title="manzel el habib" href="http://localhost/priqh2/map.php?data=2&com=13" coords="56,98,79,78,119,89,144,75,144,50,176,51,198,78,234,77,256,99,264,134,259,153,274,167,244,160,189,150,175,116,147,115,115,136,89,138" shape="poly">
                                            <area target="" alt="el hamma" title="el hamma" href="http://localhost/priqh2/map.php?data=2&com=3" coords="78,128,67,136,50,162,51,201,90,276,159,320,175,310,173,300,205,285,214,296,271,260,263,237,266,204,253,199,265,167,191,151,174,124,150,113,121,139,87,139" shape="poly">
                                            <area target="" alt="el moutuia" title="el moutuia" href="http://localhost/priqh2/map.php?data=2&com=9" coords="258,196,269,171,275,167,264,151,272,141,263,102,273,87,291,94,307,177,288,188,288,206" shape="poly">
                                            <area target="" alt="ghanouch" title="ghanouch" href="http://localhost/priqh2/map.php?data=2&com=8" coords="300,189,307,182,321,196,311,199" shape="poly">
                                            <area target="" alt="matmata" title="matmata" onclick="ajouter()" coords="173,321,138,363,176,389,200,437,292,432,303,383,317,365,298,331,226,345" shape="poly">
                                            <area target="" alt="nouvelle matmata" title="nouvelle matmata" onclick="ajouter()" coords="178,319,178,304,204,291,220,297,272,261,332,274,343,328,321,363,299,331,229,339" shape="poly">
                                            <area target="" alt="mareth" title="mareth" href="http://localhost/priqh2/map.php?data=2&com=6" coords="300,424,307,386,321,368,344,330,328,246,351,244,349,233,442,295,378,381" shape="poly">
                                            <area target="" alt="gabes ouest" title="gabes ouest" onclick="ajouter()" coords="273,260,267,232,267,202,285,209,291,192,311,202,312,224,300,220,291,246,308,266" shape="poly">
                                            <area target="" alt="gabes ville" title="gabes ville" href="http://localhost/priqh2/map.php?data=2&com=10" coords="314,217,312,203,318,199,335,214,325,222" shape="poly">
                                            <area target="" alt="gabes sud" title="gabes sud" onclick="ajouter()" coords="301,223,295,245,310,264,329,269,326,249,345,243,345,231,334,219,319,221,309,229,325,224" shape="poly">
                                        </map><i class="fas fa-street-view" style="color:red;position:absolute;left:180px;top:420px" onclick="modgov()"></i>';break;
                                        case 3 :echo '
                                        <area target="" alt="om el araies" title="om el araies" onclick="ajouter()" coords="34,200,50,172,71,165,81,138,70,136,91,103,159,142,159,162,168,170,155,185,165,199,193,204,163,221,113,232,78,209,61,214" shape="poly">
                                        <area target="" alt="metlaoui" title="metlaoui" href="http://localhost/priqh2/map.php?data=3&com=17" coords="38,297,46,311,95,336,104,366,156,360,186,367,184,354,191,318,178,313,173,319,158,302,146,275,186,234,174,231,198,214,226,219,238,210,198,194,184,177,172,169,156,182,161,196,187,201,168,217,156,238,142,228,108,231,108,250,71,253,58,263,73,289" shape="poly">
                                        <area target="" alt="redayef" title="redayef" onclick="ajouter()" coords="37,204,32,218,42,238,25,247,6,269,35,301,71,288,56,264,68,253,108,246,108,233,75,210,57,217" shape="poly">
                                        <area target="" alt="gafsa sud" title="gafsa sud" href="http://localhost/priqh2/map.php?data=3&com=15" coords="164,145,164,158,169,168,201,193,240,205,234,222,204,218,183,230,152,274,162,300,182,272,221,270,239,240,261,228,250,196,235,185,204,133" shape="poly">
                                        <area target="" alt="sidi alech" title="sidi alech" href="http://localhost/priqh2/map.php?data=3&com=18" coords="201,128,227,170,252,167,251,149,299,169,291,153,305,126,259,93" shape="poly">
                                        <area target="" alt="el ksar" title="el ksar" href="http://localhost/priqh2/map.php?data=3&com=14" coords="222,273,237,244,259,231,280,231,285,251,263,294,249,270" shape="poly">
                                        <area target="" alt="madhila" title="madhila" onclick="ajouter()" coords="164,301,171,313,193,317,190,362,273,361,285,346,258,344,247,321,260,291,251,273,183,276" shape="poly">
                                        <area target="" alt="gafsa nord" title="gafsa nord" onclick="ajouter()" coords="230,174,250,174,253,153,289,173,304,171,293,154,309,127,316,115,343,130,369,113,369,131,355,136,353,151,339,152,317,191,331,240,289,247,282,229,263,227,252,195" shape="poly">
                                        <area target="" alt="el guetar" title="el guetar" href="http://localhost/priqh2/map.php?data=3&com=16" coords="260,342,256,301,286,255,333,241,369,244,400,233,408,260,378,267,368,292,378,328,322,338,324,356,301,362,284,342" shape="poly">
                                        <area target="" alt="belkhir" title="belkhir" href="http://localhost/priqh2/map.php?data=3&com=19" coords="379,270,371,293,379,324,395,326,429,304,471,317,499,301,499,249,465,205,429,196,401,232,409,259" shape="poly">
                                        <area target="" alt="le sned" title="le sned" href="http://localhost/priqh2/map.php?data=3&com=20" coords="333,238,319,191,343,156,355,153,359,137,367,132,369,115,395,117,417,131,421,197,399,231,369,242" shape="poly">
                                    </map><i class="fas fa-street-view" style="color:red;position:absolute;left:127px;top:355px" onclick="modgov()"></i>';break;
                                    case 4 :echo '
                                    <area target="" alt="kerknah" title="kerknah" onclick="ajouter()" coords="324,199,328,193,360,195,376,170,390,144,410,145,411,167,389,182,343,211" shape="poly">
                                    <area target="" alt="skhira" title="skhira" onclick="ajouter()" coords="103,247,113,247,121,271,132,277,138,290,100,343,81,332,81,341,64,339,52,329,28,333,17,315,22,300,60,289" shape="poly">
                                    <area target="" alt="bir ali ben khelifa" title="bir ali ben khelifa" onclick="ajouter()" coords="106,105,77,154,77,172,68,183,62,219,100,241,139,215,161,229,172,219,160,195,168,190,154,152,119,152" shape="poly">
                                    <area target="" alt="ghraiba" title="ghraiba" onclick="ajouter()" coords="106,241,138,217,162,229,176,218,179,240,167,244,154,257,160,276,158,285,145,291,122,268" shape="poly">
                                    <area target="" alt="manzel chaker" title="manzel chaker" onclick="ajouter()" coords="99,92,124,63,141,59,156,67,167,63,188,75,228,49,225,37,238,80,260,93,252,111,240,131,243,137,230,153,214,146,168,131,153,151,122,151" shape="poly">
                                    <area target="" alt="agareb" title="agareb" onclick="ajouter()" coords="168,133,156,151,170,189,160,195,178,217,191,201,203,201,242,217,244,210,230,191,238,189,238,173,243,162" shape="poly">
                                    <area target="" alt="mahres" title="mahres" onclick="ajouter()" coords="168,246,159,258,159,273,178,277,204,243,234,236,238,221,208,206,192,204,176,218,180,239" shape="poly">
                                    <area target="" alt="sfax sud" title="sfax sud" onclick="ajouter()" coords="234,152,247,141,251,114,269,164,256,178,269,194,246,206,232,192,240,190,245,160" shape="poly">
                                    <area target="" alt="sakeit ezzit" title="sakeit ezzit" onclick="ajouter()" coords="252,115,270,167,276,156,275,128" shape="poly">
                                    <area target="" alt="sakiet edaier" title="sakiet edaier" onclick="ajouter()" coords="277,133,294,136,300,149,279,172" shape="poly">
                                    <area target="" alt="sfax ville" title="sfax ville" onclick="ajouter()" coords="265,170,274,167,277,180,270,181" shape="poly">
                                    <area target="" alt="sfax ouest" title="sfax ouest" onclick="ajouter()" coords="256,178,264,172,274,185,270,194" shape="poly">
                                    <area target="" alt="el hancha" title="el hancha" onclick="ajouter()" coords="226,33,237,25,259,38,272,19,279,21,288,57,275,70,294,95,283,99,286,131,279,131,251,113,262,90,242,79" shape="poly">
                                    <area target="" alt="jbenyana" title="jbenyana" onclick="ajouter()" coords="278,72,289,60,305,49,310,61,330,69,331,95,318,100,307,92,289,89" shape="poly">
                                    <area target="" alt="el amra" title="el amra" onclick="ajouter()" coords="302,145,312,131,312,110,318,102,292,93,285,100,286,131" shape="poly">
                                </map><i class="fas fa-street-view" style="color:red;position:absolute;left:215px;top:310px" onclick="modgov()"></i>';break;
                                case 5 :echo '
                                <area target="" alt="kalaat andalou" title="kalaat andalou" onclick="ajouter()" coords="194,244,259,97,287,71,389,75,375,242,340,281,321,349,318,381,277,336,233,254" shape="poly">
                                <area target="" alt="sidi thabet" title="sidi thabet" href="http://localhost/priqh2/map.php?data=5&com=29" coords="193,243,156,324,157,404,184,419,236,389,291,365,234,258" shape="poly">
                                <area target="" alt="raoued" title="raoued" onclick="ajouter()" coords="377,247,427,293,389,319,364,348,373,395,321,354,347,275" shape="poly">
                                <area target="" alt="mnihla" title="mnihla" onclick="ajouter()" coords="244,442,237,389,299,366,318,391,306,414,270,417" shape="poly">
                                <area target="" alt="ettadhamen" title="ettadhamen" onclick="ajouter()" coords="264,430,273,420,287,424,291,458" shape="poly">
                                <area target="" alt="ariana" title="ariana" onclick="ajouter()" coords="316,415,331,362,375,409,342,428" shape="poly">
                                <area target="" alt="soukra" title="soukra" onclick="ajouter()" coords="367,346,397,315,422,301,450,317,463,344,462,385,407,400,385,413" shape="poly">
                            </map><i class="fas fa-street-view" style="color:red;position:absolute;left:200px;top:150px" onclick="modgov()"></i>';break;
                            case 6 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:150px;top:180px" onclick="modgov()"></i>';break;
                            case 7 :echo '
                            <area target="" alt="Mhamdia" title="Mhamdia" href="" coords="86,154,75,189,45,231,62,256,83,265,128,297,137,290,139,255,133,224,141,219,161,203,156,190,157,177,148,172,137,173,129,165,120,163,116,154,111,149,96,158" shape="poly">
                            <area target="" alt="Mornag" title="Mornag" href="" coords="130,296,136,308,143,309,190,369,227,365,235,371,226,415,234,423,251,412,261,399,302,375,298,358,314,333,312,321,329,288,320,274,302,278,295,269,320,243,337,218,324,204,318,201,311,153,289,144,252,162,244,136,236,135,219,125,216,138,216,148,212,162,203,170,207,178,189,201,161,203,134,225,139,253,136,289" shape="poly">
                            <area target="" alt="Fouchana" title="Fouchana" href="" coords="161,203,190,202,208,178,205,170,212,163,218,151,215,141,203,148,166,126,164,134,157,130,154,132,147,121,131,114,124,115,113,132,103,140,110,146,121,161,130,165,137,172,147,170,157,178,155,189" shape="poly">
                            <area target="" alt="Mourouj" title="Mourouj" href="" coords="166,125,175,114,180,104,185,108,191,125,203,120,217,140,205,148" shape="poly">
                            <area target="" alt="Ben Arous" title="Ben Arous" href="" coords="176,103,178,94,184,89,183,82,213,94,203,105,197,109,201,119,189,123,183,106" shape="poly">
                            <area target="" alt="Megurine" title="Megurine" href="" coords="214,93,183,80,181,66,193,57,206,57,215,60,224,72,231,71,231,78" shape="poly">
                            <area target="" alt="Rades" title="Rades" href="" coords="230,70,231,80,212,96,237,113,251,101,258,86,245,64,248,51,256,40,248,34,240,46,232,48" shape="poly">
                            <area target="" alt="El medina eljedida" title="El medina eljedida" href="" coords="198,108,215,138,230,110,212,96,219,124" shape="poly">
                            <area target="" alt="Ezzhra" title="Ezzhra" href="" coords="219,124,221,115,231,108,237,112,251,100,258,85,279,106,275,111,277,117,267,118,242,133" shape="poly">
                            <area target="" alt="Hamam lif" title="Hamam lif" href="" coords="269,117,277,120,275,111,279,108,299,120,319,128,315,136,308,133,308,152,290,142,284,144,276,133" shape="poly">
                            <area target="" alt="Hamam chatt" title="Hamam chatt" href="" coords="308,132,307,150,312,152,318,200,327,199,335,200,342,157,363,134" shape="poly">
                        </map>
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:208px;top:170px" onclick="modgov()"></i>';break;
                            case 8 :echo '
                            <area target="" alt="Bizerte sud" title="Bizerte sud" href="" coords="186,157,214,138,223,144,252,126,267,124,289,117,298,124,295,133,320,144,334,160,313,172,308,181,299,179,304,187,304,195,292,205,265,198,252,190,240,204,214,190,201,199,194,196,187,181" shape="poly">
                            <area target="" alt="Bizerte nord" title="Bizerte nord" href="" coords="299,123,297,131,329,148,335,155,344,150,339,136,336,123,323,119,312,126" shape="poly">
                            <area target="" alt="Sejnane" title="Sejnane" href="" coords="186,155,176,159,154,159,124,175,112,175,82,186,80,173,42,211,20,215,37,228,30,236,24,247,38,268,68,267,76,281,73,290,78,295,99,283,128,287,136,278,136,259,141,247,133,234,129,211,161,211,176,215,176,200,193,199" shape="poly">
                            <area target="" alt="Ghezala" title="Ghezala" href="" coords="128,212,176,213,176,200,195,198,215,191,239,204,229,209,238,225,270,220,259,234,248,232,229,251,233,265,221,282,200,286,198,301,184,316,166,306,171,296,166,284,150,293,130,289,141,263,139,247" shape="poly">
                            <area target="" alt="Mateur" title="Mateur" href="" coords="198,289,196,304,201,314,192,325,228,362,241,357,279,343,247,361,289,346,300,341,307,317,315,318,319,305,329,297,321,286,331,271,328,263,324,270,305,250,293,247,282,257,277,247,281,233,271,220,259,236,247,234,229,251,235,267,221,283" shape="poly">
                            <area target="" alt="Zarzouna" title="Zarzouna" href="" coords="344,151,336,160,344,163,356,167,354,159" shape="poly">
                            <area target="" alt="Menzel Jemil" title="Menzel Jemil" href="" coords="325,176,367,176,359,207,365,211,377,199,396,191,404,185,392,163,357,159,355,166,339,162" shape="poly">
                            <area target="" alt="Ras el jebel" title="Ras el jebel" href="" coords="417,151,391,161,397,172,405,167,419,183,468,197,499,195,476,191,441,167,425,165" shape="poly">
                            <area target="" alt="Ghar el milh" title="Ghar el milh" href="" coords="423,184,457,194,499,197,492,201,452,202,446,215,413,230,403,246,394,240,390,230,402,221,411,213,414,193" shape="poly">
                            <area target="" alt="El Alia" title="El Alia" href="" coords="404,166,398,173,402,185,365,211,360,225,370,233,379,227,389,230,408,213,413,193,417,182" shape="poly">
                            <area target="" alt="Tinja" title="Tinja" href="" coords="303,195,310,202,301,208,301,221,303,245,290,242,283,249,277,240,282,229,293,217" shape="poly">
                            <area target="" alt="Menzel Bourguiba" title="Menzel Bourguiba" href="" coords="315,206,302,206,300,245,322,265,368,233,357,224,365,212,359,208,340,221,316,215" shape="poly">
                            <area target="" alt="Utique" title="Utique" href="" coords="389,231,376,227,327,258,333,268,324,282,329,296,321,304,361,312,372,327,390,325,395,320,398,327,405,325,398,313,406,291,420,280,430,253,431,237,446,229,479,229,464,221,453,220,448,213,412,226,401,244" shape="poly">
                        </map>
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:170px;top:130px" onclick="modgov()"></i>';break;
                            case 9 :echo '
                            <area target="" alt="Tabarka" title="Tabarka" href="" coords="349,35,359,44,365,64,373,65,365,81,393,93,398,108,399,124,374,134,363,159,339,149,339,124,329,116,316,122,309,134,298,127,281,136,269,124,265,129,251,119,261,102,249,97,234,91,228,74,275,58,291,69" shape="poly">
                              <area target="" alt="Ais draham" title="Ais draham" href="" coords="232,90,260,101,249,119,264,131,268,124,280,137,294,126,306,132,326,117,336,121,337,145,357,156,363,160,359,169,347,170,332,193,336,202,320,204,315,213,294,215,285,206,275,197,271,189,252,201,232,232,216,221,209,203,210,193,190,217,172,222,152,220,144,192,131,194,126,185,164,173,184,176,199,175,209,160,215,166,237,153,245,137,221,125,225,102" shape="poly">
                              <area target="" alt="Fernana" title="Fernana" href="" coords="153,221,177,225,209,198,216,219,233,237,256,204,269,191,293,218,317,215,315,223,297,238,298,254,307,265,310,280,286,295,271,303,267,283,257,287,235,290,224,299,210,278,194,281,189,287,185,277,170,292,151,273,138,267,142,245,155,235" shape="poly">
                              <area target="" alt="Balta Bouawene" title="Balta Bouawene" href="" coords="360,171,346,170,334,191,337,202,317,205,317,221,299,230,298,253,308,261,310,279,321,273,343,270,363,256,381,258,392,257,396,245,410,241,414,215,416,198,407,185" shape="poly">
                              <area target="" alt="Ghardimaou" title="Ghardimaou" href="" coords="138,271,118,274,111,283,79,301,74,313,44,323,30,337,16,336,6,347,9,364,47,381,63,378,80,385,94,377,104,388,118,390,108,410,111,425,110,436,138,437,155,418,181,409,157,394,158,368,166,358,173,360,172,349,156,334,163,320,171,295" shape="poly">
                              <area target="" alt="Oued Meliz" title="Oued Meliz" href="" coords="171,292,158,331,175,357,160,364,159,394,179,403,199,391,211,402,244,386,255,375,239,366,245,355,237,342,235,324,195,344,184,308" shape="poly">
                              <area target="" alt="Jendouba nord" title="Jendouba nord" href="" coords="169,293,185,278,189,288,195,281,209,278,224,296,235,290,266,286,271,302,325,270,332,286,340,294,354,297,352,309,353,317,338,330,340,338,325,318,304,325,293,346,270,381,253,374,242,366,244,353,237,339,193,340" shape="poly">
                              <area target="" alt="Bouselm" title="Bouselm" href="" coords="329,272,338,293,353,293,350,321,362,345,375,365,421,357,425,336,439,318,436,277,424,256,409,239,395,244,387,263,361,256,344,268" shape="poly">
                              <area target="" alt="Jendouba" title="Jendouba" href="" coords="242,385,253,375,266,379,294,347,305,323,324,318,333,337,339,337,349,320,373,365,341,388,329,387,294,397,279,395,266,397" shape="poly">
                          </map>
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:110px;top:170px" onclick="modgov()"></i>';break;
                            case 10 :echo '
                            <area target="" alt="Sbikha" title="Sbikha" href="" coords="239,21,247,23,254,34,269,36,279,36,293,44,306,47,311,27,322,29,335,14,334,1,343,1,340,24,364,42,359,60,339,78,334,96,337,108,328,112,319,104,303,106,288,118,273,99,267,104,249,98,238,87,227,85,223,88,217,76,230,69,236,54,235,39,230,33,239,28" shape="poly">
                              <area target="" alt="Oueslatia" title="Oueslatia" href="" coords="153,147,148,135,152,124,131,112,148,101,137,96,140,85,133,86,134,72,149,69,217,12,229,9,242,25,232,34,239,42,234,50,233,68,217,74,220,83,238,87,249,100,241,117,224,130,199,133,186,129,184,111,173,112,175,118,165,120,167,130,156,134" shape="poly">
                              <area target="" alt="Alaa" title="Alaa" href="" coords="66,140,73,135,84,140,94,139,103,144,113,136,127,131,140,131,148,125,145,136,147,144,151,150,153,160,174,159,180,168,198,176,197,182,170,172,173,181,154,190,149,178,135,174,120,175,108,186,93,172,83,153" shape="poly">
                              <area target="" alt="Haffouz" title="Haffouz" href="" coords="174,111,184,110,188,131,222,129,241,118,248,137,251,149,237,157,239,175,218,175,228,190,240,198,244,210,211,216,176,198,172,211,163,212,155,190,177,172,201,183,175,158,154,159,157,138,168,131" shape="poly">
                              <area target="" alt="Chbika" title="Chbika" href="" coords="219,179,239,177,237,159,251,151,248,133,242,115,247,100,265,104,272,101,287,117,280,137,294,144,292,167,303,167,298,176,308,178,308,191,300,199,284,185,277,201,266,207,245,209" shape="poly">
                              <area target="" alt="Kairouan nord" title="Kairouan nord" href="" coords="285,116,282,136,291,139,303,148,322,148,353,136,350,124,337,110,327,112,315,103,303,109" shape="poly">
                              <area target="" alt="Kairouan sud" title="Kairouan sud" href="" coords="294,144,290,163,300,163,298,174,309,178,299,196,282,186,265,205,263,226,281,225,284,213,310,206,313,210,318,201,344,217,352,206,361,215,369,205,358,189,374,175,382,176,354,136,319,147" shape="poly">
                              <area target="" alt="Bou Hajla" title="Bou Hajla" href="" coords="264,224,257,233,267,233,266,255,276,278,288,276,302,275,302,288,314,289,320,282,332,292,340,290,359,298,347,276,355,264,344,252,349,232,363,225,361,213,351,205,342,215,319,202,312,213,284,209,282,222" shape="poly">
                              <area target="" alt="Nasrallah" title="Nasrallah" href="" coords="198,222,197,248,201,261,201,275,198,290,201,297,228,314,270,321,286,302,284,278,273,277,268,250,259,232,267,217,265,205,228,213,211,222" shape="poly">
                              <area target="" alt="Candar" title="Candar" href="" coords="281,275,302,278,302,288,319,286,339,289,363,297,359,306,360,318,343,322,306,355,292,346,295,315,275,317" shape="poly">
                              <area target="" alt="" title="" href="" coords="" shape="0">
                          </map>
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:190px;top:250px" onclick="modgov()"></i>';break;
                            case 11 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:100px;top:270px" onclick="modgov()"></i>';break;
                            case 12 :echo '
                            <area target="" alt="Faour" title="Faour" href="" coords="134,111,42,183,17,192,16,229,32,247,44,244,72,263,84,264,79,275,125,325,133,393,259,373,244,287,226,250,216,205,197,194,216,181,172,124" shape="poly">
                            <area target="" alt="Souk El Ahad" title="Souk El Ahad" href="" coords="136,109,163,86,180,62,185,49,220,47,228,38,236,45,250,44,248,33,264,25,269,30,296,23,309,39,293,61,296,90,263,92,257,119,245,124,225,119,224,126,210,138" shape="poly">
                            <area target="" alt="Kebili nord" title="Kebili nord" href="" coords="212,138,223,127,223,116,245,124,255,120,264,93,296,89,306,107,313,128,325,131,310,139,280,137,251,151,237,141,232,148" shape="poly">
                            <area target="" alt="Kebili Sud" title="Kebili Sud" href="" coords="172,124,230,148,236,142,250,151,280,138,293,140,310,140,326,134,332,145,345,152,333,164,308,157,302,168,251,167,240,166,225,164,224,177,215,177" shape="poly">
                            <area target="" alt="Douz" title="Douz" href="" coords="195,193,211,187,213,178,224,176,228,165,242,168,301,168,308,158,332,164,346,154,355,157,351,173,342,176,366,199,378,222,400,241,413,237,418,244,414,276,424,288,436,292,421,297,428,316,426,326,417,326,423,333,420,340,412,341,428,356,423,361,414,353,391,330,378,332,356,340,341,352,261,374,241,285,228,252,216,203" shape="poly">
                        </map> <i class="fas fa-street-view" style="color:red;position:absolute;left:130px;top:450px" onclick="modgov()"></i>';break;
                            case 13 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:115px;top:230px" onclick="modgov()"></i>';break;
                            case 14 :echo '
                            <area target="" alt="Ouled Chamkh" title="Ouled Chamkh" href="" coords="45,74,56,89,49,100,47,112,37,116,37,124,48,138,79,132,86,136,101,142,113,120,107,115,112,106,123,111,122,97,107,89,97,90,93,100,74,77,70,68,78,55,68,60,62,60" shape="poly">
                            <area target="" alt="Hbira" title="Hbira" href="" coords="35,124,29,148,42,159,32,176,43,194,52,198,47,210,50,221,72,233,81,226,93,216,91,208,82,203,88,196,69,181,61,185,60,174,77,158,80,146,71,150,62,154,64,141,81,133,48,136" shape="poly">
                            <area target="" alt="Chorbane" title="Chorbane" href="" coords="73,230,81,225,85,230,93,231,112,246,145,232,168,209,159,193,153,186,145,190,127,172,129,149,117,158,115,163,108,161,103,158,101,145,93,147,85,147,78,156,61,172,61,180,68,178,86,194,85,201,90,204,92,214" shape="poly">
                            <area target="" alt="Essouassi" title="Essouassi" href="" coords="112,118,99,144,98,155,113,161,128,148,127,170,145,190,153,184,158,192,165,185,159,165,166,164,173,155,170,144,181,152,185,144,177,140,189,139,185,135,177,130,169,115,159,120,155,131,142,129,129,122,123,110,112,105" shape="poly">
                            <area target="" alt="El Jem" title="El Jem" href="" coords="162,164,166,185,178,179,188,188,206,194,221,183,225,171,232,172,233,180,249,182,250,172,237,162,238,150,230,131,222,124,210,119,202,131,193,137,177,139,182,140,180,150,172,144,172,153" shape="poly">
                            <area target="" alt="Boumerdes" title="Boumerdes" href="" coords="154,125,157,107,165,102,172,93,203,91,219,109,238,109,244,113,229,127,209,119,202,129,189,137,177,128,168,112" shape="poly">
                            <area target="" alt="Sidi Alouane" title="Sidi Alouane" href="" coords="228,130,248,112,255,126,266,122,270,132,277,130,278,145,269,144,267,154,276,154,277,176,264,207,256,221,242,224,232,200,231,180,245,182,248,172,236,162,236,149" shape="poly">
                            <area target="" alt="Ksour Essef" title="Ksour Essef" href="" coords="244,112,252,122,267,121,270,130,278,128,278,144,269,142,267,152,276,152,277,174,285,176,291,171,298,164,310,168,316,160,301,142,306,120,304,104,281,100,263,101" shape="poly">
                            <area target="" alt="Mehdia" title="Mehdia" href="" coords="246,114,241,103,246,89,256,80,265,85,272,68,288,64,297,60,311,79,301,102,279,99,265,100" shape="poly">
                            <area target="" alt="Chebba" title="Chebba" href="" coords="297,164,308,168,315,162,345,184,341,188,329,188,327,196,321,208,299,202,289,180,290,169" shape="poly">
                            <area target="" alt="Melloulech" title="Melloulech" href="" coords="277,172,289,172,297,201,321,209,311,214,302,239,287,240,275,228,273,216,265,204" shape="poly">
                        </map>
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:215px;top:280px" onclick="modgov()"></i>';break;
                            case 15 :echo '
                            <area target="" alt="Tebourba" title="Tebourba" href="" coords="24,117,38,93,59,101,86,76,114,62,129,77,150,70,166,25,185,3,224,55,202,118,230,117,216,131,198,136,192,123,180,120,178,129,122,123,96,140,52,162,34,143" shape="poly">
                            <area target="" alt="Jdaida" title="Jdaida" href="" coords="203,21,257,19,270,40,306,38,307,63,296,93,291,101,290,110,264,122,247,124,236,181,221,151,230,120,206,119,222,55" shape="poly">
                            <area target="" alt="El Battan" title="El Battan" href="" coords="56,165,77,185,120,199,138,210,150,199,163,202,201,180,234,180,221,151,226,127,197,133,182,121,173,129,123,123" shape="poly">
                            <area target="" alt="Borj El Amri" title="Borj El Amri" href="" coords="154,208,163,199,199,178,232,176,267,186,280,190,291,220,255,245,222,269,210,282,212,299,196,304,190,290,176,266,172,249,163,241,168,216" shape="poly">
                            <area target="" alt="Mornaguia" title="Mornaguia" href="" coords="210,301,222,331,248,346,278,306,306,278,325,259,335,274,342,281,352,264,367,250,371,229,358,213,349,193,333,189,327,169,313,153,291,148,262,149,263,121,246,123,236,175,279,187,291,219,265,239,247,260,220,268,210,281" shape="poly">
                            <area target="" alt="Douar Hicher" title="Douar Hicher" href="" coords="359,113,373,116,371,125,359,120" shape="poly">
                            <area target="" alt="Mannouba" title="Mannouba" href="" coords="359,140,376,137,380,128,371,122,361,121,353,130" shape="poly">
                            <area target="" alt="Oeued Ellil" title="Oeued Ellil" href="" coords="263,121,262,147,314,152,328,136,352,153,359,140,352,130,359,118,351,105,356,93,352,82,326,96,311,99,310,112,290,109" shape="poly">
                        
                        </map>
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:180px;top:160px" onclick="modgov()"></i>';break;
                            case 16 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:260px;top:430px" onclick="modgov()"></i>';break;
                            case 17 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:250px;top:250px" onclick="modgov()"></i>';break;
                            case 18 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:240px;top:175px" onclick="modgov()"></i>';break;
                            case 19 :echo '
                            <area target="" alt="Cebelat ouled askar" title="Cebelat ouled askar" href="" coords="142,85,117,129,129,136,155,158,149,165,151,176,147,184,165,197,176,181,179,152,165,143,152,124,157,114,149,93" shape="poly">
                            <area target="" alt="Jelma" title="Jelma" href="" coords="145,84,170,68,200,66,209,73,205,83,214,89,206,96,203,104,229,133,212,146,205,168,200,175,187,164,177,171,181,151,165,143,153,124,158,116" shape="poly">
                            <area target="" alt="Sidi bouzid ouest" title="Sidi bouzid ouest" href="" coords="179,180,184,172,187,163,190,178,200,173,221,182,220,192,210,189,198,201,211,203,211,215,200,221,202,234,194,242,205,271,200,292,189,297,186,275,165,260,186,247,178,230,169,215,154,217" shape="poly">
                            <area target="" alt="Sidi bouzid est" title="Sidi bouzid est" href="" coords="201,173,211,149,227,137,236,133,262,149,267,187,269,197,293,227,275,236,240,232,233,236,220,237,225,241,224,251,213,260,203,271,194,246,202,237,197,221,212,210,199,201,209,193,217,193,219,183" shape="poly">
                            <area target="" alt="Oueld Haffouz" title="Oueld Haffouz" href="" coords="265,163,327,183,346,172,345,207,329,200,293,224,272,197" shape="poly">
                            <area target="" alt="Bir el haffey" title="Bir el haffey" href="" coords="106,236,125,221,151,219,169,216,183,245,163,259,182,272,190,303,165,317,147,281,133,278,142,264,125,260,110,256" shape="poly">
                            <area target="" alt="Ben Oun" title="Ben Oun" href="" coords="105,234,87,252,87,260,97,266,80,280,29,304,48,314,65,324,77,316,99,330,118,316,130,325,139,319,152,326,161,316,148,283,131,277,138,260,108,255" shape="poly">
                            <area target="" alt="Menzel Bouzaiane" title="Menzel Bouzaiane" href="" coords="138,328,141,336,156,335,147,361,149,367,156,363,163,372,169,378,163,387,169,387,187,390,200,392,198,383,208,381,209,365,221,360,214,355,213,343,230,331,219,309,221,301,192,302,165,316,161,326" shape="poly">
                            <area target="" alt="Souk jdid" title="Souk jdid" href="" coords="184,292,188,300,220,300,225,299,232,309,244,303,247,295,249,267,255,239,264,233,236,230,229,235,217,235,223,240,222,249,210,263,198,292" shape="poly">
                            <area target="" alt="Meknassy" title="Meknassy" href="" coords="225,299,218,309,231,330,213,341,213,354,221,359,209,363,209,379,199,383,200,393,230,396,255,388,270,363,267,354,297,342,275,317,269,303,252,297,234,307" shape="poly">
                            <area target="" alt="Regueb" title="Regueb" href="" coords="325,201,317,215,277,234,264,232,256,242,249,261,249,295,265,299,273,316,299,341,309,339,321,333,323,307,333,303,334,280,365,220" shape="poly">
                            <area target="" alt="Mezzouna" title="Mezzouna" href="" coords="202,394,230,394,256,384,269,362,266,352,311,339,319,343,314,358,321,353,341,364,343,375,363,379,334,405,325,403,327,409,310,433,296,434,271,444,285,463,264,463,253,451,225,452,222,437,226,428,216,423,212,405" shape="poly">
                        </map>
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:160px;top:330px" onclick="modgov()"></i>';break;
                            case 20 :echo '
                            <area target="" alt="El Krib" title="El Krib" href="" coords="77,44,104,33,116,44,127,45,136,62,143,68,146,83,165,72,193,79,205,92,173,129,151,112,127,128,117,152,83,105,97,86" shape="poly">
                            <area target="" alt="Bou Rouis" title="Bou Rouis" href="" coords="119,150,126,130,150,113,172,131,178,150,189,154,186,167,198,186,164,207,147,194,139,198,132,193,134,185,124,186,117,166,124,154" shape="poly">
                            <area target="" alt="Gaafour" title="Gaafour" href="" coords="171,129,233,60,242,68,250,60,253,69,250,72,266,85,276,93,269,117,258,145,259,173,237,172,223,180,208,187,195,183,183,167,189,152,177,146" shape="poly">
                            <area target="" alt="El Aroussa" title="El Aroussa" href="" coords="231,64,234,54,229,44,247,43,258,34,270,36,287,32,309,48,275,90,251,70,250,57,241,69" shape="poly">
                            <area target="" alt="Bouarada" title="Bouarada" href="" coords="308,52,341,48,343,38,363,40,372,32,381,79,365,91,349,115,324,125,334,137,345,132,343,143,332,154,336,161,318,172,301,159,279,162,289,176,281,180,271,177,263,181,258,171,258,142,276,90" shape="poly">
                            <area target="" alt="Siliana nord" title="Siliana nord" href="" coords="163,205,198,184,235,172,258,172,263,181,270,178,283,178,293,193,255,208,245,205,192,239,198,263,205,256,214,259,211,277,198,288,190,277,168,277,161,265,160,249,167,233" shape="poly">
                            <area target="" alt="Bargou" title="Bargou" href="" coords="277,162,302,160,317,172,333,161,332,154,343,144,367,158,376,168,380,161,387,168,379,202,325,252,313,246,305,248,297,233,281,232,289,209,292,189" shape="poly">
                            <area target="" alt="Siliana sud" title="Siliana sud" href="" coords="191,240,197,262,203,256,215,258,213,277,199,289,219,297,225,313,229,302,235,300,255,311,255,288,271,279,279,291,287,289,328,255,316,246,305,250,299,232,282,233,295,195,256,208,247,205" shape="poly">
                            <area target="" alt="Makthar" title="Makthar" href="" coords="160,249,143,264,142,283,122,294,108,315,120,335,114,345,135,340,142,326,156,320,162,323,159,331,173,340,182,355,199,344,213,339,208,324,219,322,223,313,217,296,190,278,169,276,162,265" shape="poly">
                            <area target="" alt="Kesra" title="Kesra" href="" coords="209,323,218,322,225,300,232,300,253,311,254,285,269,279,283,290,284,300,296,304,295,312,289,317,298,321,282,337,302,356,297,365,275,368,265,373,257,382,245,376,217,369,209,376,181,353,209,340" shape="poly">
                            <area target="" alt="Rouhia" title="Rouhia" href="" coords="97,390,105,379,122,389,113,346,135,342,143,324,153,320,158,321,157,329,208,377,231,402,238,423,260,442,254,456,267,473,233,480,221,455,194,444,181,440,179,423,153,418,141,423,131,411,112,410,107,396" shape="poly">
                        </map>
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:145px;top:232px" onclick="modgov()"></i>';break;
                            case 21 :echo '
                            <area target="" alt="Bouficha" title="Bouficha" href="" coords="176,49,209,65,225,41,237,60,216,109,209,161,199,165,175,157,170,175,167,161,161,165,154,156,156,139,161,130,179,114,164,109,164,101,171,104,177,93,173,84,169,73" shape="poly">
                            <area target="" alt="Enfidha" title="Enfidha" href="" coords="157,133,143,125,121,134,128,144,128,155,117,165,108,162,99,173,89,169,95,196,114,201,125,216,120,227,137,235,155,237,161,233,163,219,178,213,185,217,214,209,210,163,198,165,173,155,168,171,166,160,159,165,153,152" shape="poly">
                            <area target="" alt="Hergla" title="Hergla" href="" coords="215,207,183,216,175,213,160,220,161,233,180,242,195,235,200,240,211,249,219,247,227,253,230,259,238,256,231,229,215,218" shape="poly">
                            <area target="" alt="Kondar" title="Kondar" href="" coords="120,228,135,234,154,237,150,247,158,254,161,264,156,273,165,283,157,295,145,291,95,338,117,385,110,387,91,358,83,346,92,326,98,306,116,285,123,262" shape="poly">
                            <area target="" alt="Sidi bou Ali" title="Sidi bou Ali" href="" coords="165,235,150,248,160,263,189,299,210,298,226,275,231,259,219,246,213,251,197,239,179,242" shape="poly">
                            <area target="" alt="Akouda" title="Akouda" href="" coords="239,257,226,262,227,274,251,300,249,322,256,322,264,316,256,303,263,292" shape="poly">
                            <area target="" alt="Kalaa Kobra" title="Kalaa Kobra" href="" coords="160,265,155,273,163,284,153,297,167,320,145,340,173,358,185,352,200,342,214,345,224,340,230,343,234,334,247,324,252,303,227,278,211,298,189,299" shape="poly">
                            <area target="" alt="Kalaa sghira" title="Kalaa sghira" href="" coords="200,341,172,355,186,379,193,380,222,361,243,355,259,346,263,335,254,322,235,329,231,344,222,338,213,344" shape="poly">
                            <area target="" alt="Sidi el heni" title="Sidi el heni" href="" coords="97,341,144,337,172,357,189,383,223,359,227,371,205,406,196,414,201,434,181,435,166,447,158,449,153,455,157,460,149,465,122,409,127,397,117,386" shape="poly">
                            <area target="" alt="Mseken" title="Mseken" href="" coords="225,360,271,357,273,363,271,370,287,378,289,406,282,411,292,422,276,441,278,450,261,452,249,477,250,483,230,498,225,446,203,433,197,414,225,373" shape="poly">
                            <area target="" alt="Hammam Soussa" title="Hammam Soussa" href="" coords="262,293,254,304,263,316,256,324,261,336,271,328,273,313" shape="poly">
                            <area target="" alt="Sidi Abdelhmid" title="Sidi Abdelhmid" href="" coords="263,334,271,325,285,335,274,343,261,342" shape="poly">
                            <area target="" alt="Sousse medina" title="Sousse medina" href="" coords="273,314,270,323,306,360,289,336" shape="poly">
                            <area target="" alt="Sousse Jawhara" title="Sousse Jawhara" href="" coords="286,336,274,346,283,351,293,353,299,366,310,355" shape="poly">
                            <area target="" alt="Sousse Riadh" title="Sousse Riadh" href="" coords="235,358,261,342,273,342,281,350,291,353,297,364,297,374,288,378,270,366,268,355" shape="poly">
                        </map>
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:220px;top:252px" onclick="modgov()"></i>';break;
                            case 22 :echo '
                            <area target="" alt="Bir lahmer" title="Bir lahmer" href="" coords="333,37,354,24,357,28,371,30,363,41,345,53,338,49" shape="poly">
                            <area target="" alt="Ghomrassen" title="Ghomrassen" href="" coords="331,37,317,43,310,50,299,49,295,56,279,54,268,57,274,67,285,73,315,74,329,73,337,74,360,52,373,50,363,41,343,51" shape="poly">
                            <area target="" alt="Tataouine sud" title="Tataouine sud" href="" coords="286,71,276,74,275,84,281,91,279,99,269,98,274,106,276,111,268,113,278,127,284,141,308,140,331,131,341,139,352,138,350,114,352,99,357,93,349,86,355,81,349,75,352,61" shape="poly">
                            <area target="" alt="Tataouine nord" title="Tataouine nord" href="" coords="375,46,388,45,389,59,397,67,409,65,413,70,400,75,401,85,393,95,393,104,407,118,417,119,461,185,429,185,401,157,388,157,372,155,363,143,353,137,349,115,357,95,349,85,355,77,351,59,360,49" shape="poly">
                            <area target="" alt="Dhiba" title="Dhiba" href="" coords="386,155,399,157,428,185,461,185,461,191,415,218,416,224,397,243,385,243,380,253,382,263,373,274,369,285,358,288,345,285,333,293,311,334,250,339,263,308,276,293,296,282,304,273,306,260,317,258,329,245,337,238,360,239,365,220,377,210,387,204,401,173" shape="poly">
                            <area target="" alt="Remada" title="Remada" href="" coords="277,129,249,103,240,105,224,109,208,121,108,149,45,157,151,229,229,548,269,523,283,525,328,465,338,437,336,404,311,336,248,335,273,293,294,283,308,261,337,237,358,239,367,216,387,203,400,173,385,156,367,155,353,140,338,136,329,129,306,139,284,139" shape="poly">
                        </map> <i class="fas fa-street-view" style="color:red;position:absolute;left:160px;top:550px" onclick="modgov()"></i>';break;
                            case 23 :echo '
                            <area target="" alt="Tamaghza" title="Tamaghza" href="" coords="231,45,214,49,199,59,176,75,170,85,143,91,129,167,72,173,62,206,42,225,188,177,204,177,180,127,200,119,218,93,236,88,223,73" shape="poly">
                                <area target="" alt="Hazoua" title="Hazoua" href="" coords="40,222,109,201,96,327,147,389,174,432,147,455,104,470,56,385,55,369,47,349,54,343,32,324,40,309,33,283,39,273,40,249,43,237" shape="poly">
                                <area target="" alt="Nefta" title="Nefta" href="" coords="110,204,196,179,176,242,181,278,254,362,172,429,94,324" shape="poly">
                                <area target="" alt="Tozeur" title="Tozeur" href="" coords="200,174,178,243,182,276,255,362,304,321,248,265,248,253,232,251" shape="poly">
                                <area target="" alt="Dagach" title="Dagach" href="" coords="179,126,199,119,236,165,283,187,300,204,295,216,308,220,348,213,400,218,360,278,304,319,251,269,248,252,232,249" shape="poly">
                            </map> <i class="fas fa-street-view" style="color:red;position:absolute;left:75px;top:400px" onclick="modgov()"></i>';break;
                            case 24 :echo '
                            <area target="" alt="Bir Mchergua" title="Bir Mchergua" href="" coords="85,161,79,148,100,141,119,120,121,100,137,91,159,99,172,76,191,65,204,41,212,45,211,50,216,62,297,132,311,131,318,137,313,158,299,156,288,153,275,134,269,138,267,146,270,154,265,158,259,143,239,141,223,155,243,175,225,188,204,188,206,217,191,208,195,203,190,198,185,203,171,190,176,175,185,175,176,161,174,152,166,157,156,155,161,165,152,170,128,154,112,166,111,172,94,161" shape="poly">
                            <area target="" alt="El Fahs" title="El Fahs" href="" coords="85,160,99,162,114,174,115,165,129,155,154,170,164,164,163,156,182,164,175,156,185,175,171,184,184,203,190,198,195,202,191,208,199,214,204,236,229,244,227,264,219,278,219,292,207,300,194,291,169,302,148,299,156,309,157,320,133,339,147,369,132,378,114,358,93,356,100,324,93,315,88,319,47,292,46,281,35,285,19,274,54,256,71,240,97,213" shape="poly">
                            <area target="" alt="Zaghouan" title="Zaghouan" href="" coords="225,156,238,143,258,145,264,160,269,155,269,141,274,137,287,155,295,157,312,160,330,155,354,139,354,150,357,179,368,189,374,197,369,217,353,223,342,219,308,192,280,212,277,224,253,210,229,244,202,235,201,216,204,191,219,191,243,174" shape="poly">
                            <area target="" alt="Ez-riba" title="Ez-riba" href="" coords="278,224,280,212,309,192,346,220,368,217,375,228,378,242,372,253,364,252,363,258,378,265,360,284,343,279,318,286,290,248,288,253,276,256,260,248,245,256,250,267,238,272,229,280,222,272,229,244,254,212" shape="poly">
                            <area target="" alt="Saouaf" title="Saouaf" href="" coords="246,258,259,249,270,259,285,258,290,248,328,299,322,308,315,322,307,319,294,330,286,323,288,336,265,338,258,323,206,329,202,322,223,306,218,283,222,271,227,281,240,269,250,267" shape="poly">
                            <area target="" alt="En-Nadhour" title="En-Nadhour" href="" coords="149,299,167,303,191,292,206,300,219,294,222,306,202,321,206,330,257,325,266,339,259,349,265,363,234,382,223,412,210,404,199,391,189,390,174,386,159,389,152,375,134,339,158,321" shape="poly">
                        </map>
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:200px;top:190px" onclick="modgov()"></i>';break;
                                            }
                                            if($_GET['com']!=0){
                           
                                                $c= $_GET['com'];
                                                switch($c){
                                                    
                                                    case 1 :echo '
                                                    <i class="fas fa-street-view" onclick="modcom()" style="color:red;position:absolute;left:600px;top:425px"></i>';break;
                                                case 2 :echo '
                                                <i class="fas fa-street-view" onclick="modcom()" style="color:red;position:absolute;left:860px;top:200px"></i>';break;
                                            case 3 :echo '
                                            <i class="fas fa-street-view" onclick="modcom()" style="color:red;position:absolute;left:127px;top:355px"></i>';break;
                                        case 4 :echo '
                                        <i class="fas fa-street-view" style="color:red;position:absolute;left:215px;top:310px" onclick="modcom()"></i>';break;
                                        case 5 :echo '
                                        <i class="fas fa-street-view" style="color:red;position:absolute;left:200px;top:150px" onclick="modcom()"></i>';break;
                                        }
                                                echo '<script>document.getElementById("gov").style.display="none";</script>';
                                                $req ="SELECT p.id_projet,p.rang_projet,p.nombre_quartier,p.nombre_maison,p.nombre_habitant,p.assainissement_cout 
                                                FROM projet p,commune g where p.id_commune=g.id_commune and  g.id_commune= '" .$c."'";
                                                $result = $conn->query($req);
                                            $result = $conn->query($req);
                                            if ($result->rowCount() > 0) {
                                                echo '
                                                
                                                 <table class="table">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th scope="col">rang projet</th>
                                                       
                                                        <th scope="col">nombre quartier</th>
                                                        
                                                        <th scope="col">nombre maison </th>
                                                        <th scope="col">nombre habitant</th>
                                                        <th scope="col">assainissement cout</th>
                                                        <th scope="col"><i class="fas fa-database" onmouseover="color(this,1)"
                                                        onmouseout="color(this,2)" title="ajouter un projet" onClick="ajout()"></i></th>
                                                        
                                            
                                                    </tr>
                                                </thead>
                                                <tbody>';
                                                
                                                while($row = $result->fetch()) {
                                                    
                                                        echo  '<tr>
                                                              
                                                                <td><b>#'. $row['rang_projet'] .'</b></td>
                                                              
                                                                <td><b>'. $row['nombre_quartier'] .'</b></td>
                                                                <td><b>'. $row['nombre_maison'] .'</b></td>
                                                                <td><b>'.  $row['nombre_habitant'] .'</b></td>
                                                                <td><b>'. $row['assainissement_cout'] .'</b></td>
                                                                <td><b>
                                                                <i class="fas fa-trash" title="supprimer" onClick="supprime('. $row['id_projet'] .')"onmouseover="color(this,1)"
                                                                onmouseout="color(this,2)"></i>
                                                                <i class="fa fa-pen" title="modifier" onClick="modifier('. $row['id_projet'] .')"onmouseover="color(this,1)"
                                                                onmouseout="color(this,2)"></i>
                                                                </b></td>
                                                                </tr>';
                                                                }

                                                            }
                                                                else if ($result->rowCount()== 0) 
                                                                    echo "<h2 style='color:white'>aucun projet n'est trouve</h2>";
                                                                
                                                                                }
                                                                               
                                                                            }
                                            
                           else if ($result->rowCount()== 0) {
                                $req2 ="SELECT nom_gouvernorat_fr
                            FROM gouvernorat where id_gouvernorat= '" .$r."'";
                            $result2 = $conn->query($req2);
                        $result2 = $conn->query($req2);
                        if ($result2->rowCount() > 0) {
                            $row = $result2->fetch();
                            $img=$row['nom_gouvernorat_fr'];
                            echo '<img src="source/'.$img.'.png">';
                                echo "<h2 style='color:white'>aucun projet n'est trouve</h2>";
                                switch($r){
                                     
                                    case 1 :echo '
                                    <i class="fas fa-street-view" onclick="modgov()" style="color:red;position:absolute;left:204px;top:154px"></i>';break;
                                case 2 :echo '
                                <i class="fas fa-street-view" onclick="modgov()" style="color:red;position:absolute;left:180px;top:420px"></i>';break;
                            case 3 :echo '
                            <i class="fas fa-street-view" onclick="modgov()" style="color:red;position:absolute;left:127px;top:355px"></i>';break;
                        case 4 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:215px;top:310px" onclick="modgov()"></i>';break;
                        case 5 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:200px;top:150px" onclick="modgov()"></i>';break;
                        case 6 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:150px;top:180px" onclick="modgov()"></i>';break;
                        case 7 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:208px;top:170px" onclick="modgov()"></i>';break;
                        case 8 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:170px;top:130px" onclick="modgov()"></i>';break;
                        case 9 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:110px;top:170px" onclick="modgov()"></i>';break;
                        case 10 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:190px;top:250px" onclick="modgov()"></i>';break;
                        case 11 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:100px;top:270px" onclick="modgov()"></i>';break;
                        case 12 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:130px;top:450px" onclick="modgov()"></i>';break;
                        case 13 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:115px;top:230px" onclick="modgov()"></i>';break;
                        case 14 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:215px;top:280px" onclick="modgov()"></i>';break;
                        case 15 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:230px;top:150px" onclick="modgov()"></i>';break;
                        case 16 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:260px;top:430px" onclick="modgov()"></i>';break;
                        case 17 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:250px;top:250px" onclick="modgov()"></i>';break;
                        case 18 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:240px;top:175px" onclick="modgov()"></i>';break;
                        case 19 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:160px;top:330px" onclick="modgov()"></i>';break;
                        case 20 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:145px;top:232px" onclick="modgov()"></i>';break;
                        case 21 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:220px;top:252px" onclick="modgov()"></i>';break;
                        case 22 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:160px;top:550px" onclick="modgov()"></i>';break;
                        case 23 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:75px;top:400px" onclick="modgov()"></i>';break;
                        case 24 :echo '
                        <i class="fas fa-street-view" style="color:red;position:absolute;left:200px;top:190px" onclick="modgov()"></i>';break;
                                      }}
                                else if ($result->rowCount()== 0) {
                                    switch($r){
                                        //24 case xo 
                                        case 1 :echo '
                                        <i class="fas fa-street-view" onclick="addgov()" style="color:red;position:absolute;left:204px;top:154px"></i>';break;
                                    case 2 :echo '
                                    <i class="fas fa-street-view" onclick="addgov()" style="color:red;position:absolute;left:180px;top:420px"></i>';break;
                                case 3 :echo '
                                <i class="fas fa-street-view" onclick="addgov()" style="color:red;position:absolute;left:127px;top:355px"></i>';break;
                            case 4 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:215px;top:310px" onclick="addgov()"></i>';break;
                            case 5 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:200px;top:150px" onclick="addgov()"></i>';break;
                            case 6 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:150px;top:180px" onclick="addgov()"></i>';break;
                            case 7 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:208px;top:170px" onclick="addgov()"></i>';break;
                            case 8 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:170px;top:130px" onclick="addgov()"></i>';break;
                            case 9 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:110px;top:170px" onclick="addgov()"></i>';break;
                            case 10 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:190px;top:250px" onclick="addgov()"></i>';break;
                            case 11 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:100px;top:270px" onclick="addgov()"></i>';break;
                            case 12 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:130px;top:450px" onclick="addgov()"></i>';break;
                            case 13 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:115px;top:230px" onclick="addgov()"></i>';break;
                            case 14 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:215px;top:280px" onclick="addgov()"></i>';break;
                            case 15 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:230px;top:150px" onclick="addgov()"></i>';break;
                            case 16 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:260px;top:430px" onclick="addgov()"></i>';break;
                            case 17 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:250px;top:250px" onclick="addgov()"></i>';break;
                            case 18 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:240px;top:175px" onclick="addgov()"></i>';break;
                            case 19 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:160px;top:330px" onclick="addgov()"></i>';break;
                            case 20 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:145px;top:232px" onclick="addgov()"></i>';break;
                            case 21 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:220px;top:252px" onclick="addgov()"></i>';break;
                            case 22 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:160px;top:550px" onclick="addgov()"></i>';break;
                            case 23 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:75px;top:400px" onclick="addgov()"></i>';break;
                            case 24 :echo '
                            <i class="fas fa-street-view" style="color:red;position:absolute;left:200px;top:190px" onclick="addgov()"></i>';break;
                                              }
                                }
                                            }
                                          
                                        }
                                            
                                            } ?>
                                            
                                    </tbody>
                                </table>
                                </div> 
                       
                                
                </div>
 

     <!-- ajouter commune-->
     <div id="id01" class="modal">
            <form class="modal-content animate" action="http://localhost/priqh2/createCom.php?data=<?php echo $r ; ?>" method="post">
            
                <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
                <h1>ajouter commune</h1>
                </div>

                <div class="container">
                    
                <input type="text" placeholder="Enter le nom du commune" name="nom" required>
                                        
                </div>

                <div class="container" style="background-color:#f1f1f1">
                <button type="submit" style="max-width:90px;margin-right:5px">valider</button>
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                
                    </div>
                </form>
</div>
<div class="cont">
<!-- modifier gouvernorat-->
<div id="id02" class="modal">
  
  <form class="modal-content animate" action="editgov.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close">&times;</span>
      <h1>modifier gouvernorat</h1>
    </div>

    <div class="container">
    <table>
         
                               
                                    <tbody>
                                   <?php
                        
                        if($conn){ 
                        $req = "SELECT *
                                FROM gouvernorat  WHERE id_gouvernorat=" .$r;
                        $result = $conn->query($req);
                        if ($result->rowCount() > 0) {
                            while($row = $result->fetch()) {
                    
                                    echo  '<tr>
                                    
                                    <td>id gouvernorat</td> 
                             <td><input name="id" readonly type="number" value="'. $row['id_gouvernorat'] .'"></td>
                             </tr>
                             <tr>
                                    <td>nom gouvernorat</td>      
                              <td><input name="fr" type="text" value="'. $row['nom_gouvernorat_fr'] .'"></td>
                              </tr>
                              <tr>
                                    <td>nom gouvernorat en arabe</td>       
                             <td><input name="ar" type="text" value="'. $row['nom_gouvernorat_ar'] .'"></td>
                             </tr>
                             ';
                                            }
                                            }
                                            } ?>
                                           
                                    </tbody>
                                </table>                    
    </div>

    <div class="container" style="background-color:#f1f1f1">
    <button type="submit" name="save" style="max-width:90px;margin-right:5px" onClick="valider()">valider</button>
      <button type="submit" name="sup" class="cancelbtn">suprimer gouvernorat</button>
      
    </div>
  </form>
</div>



<!-- modifier commune-->
<div id="id03" class="modal">
  <form class="modal-content animate" action="http://localhost/priqh2/editcom.php?data=<?php echo $r ; ?>&com=<?php echo $c ; ?>" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close">&times;</span>
      <h1>modifier commune</h1>
    </div>

    <div class="container">
    <table>
         
                               
                                    <tbody>
                                   <?php
                        
                        if($conn){ 
                        $req = "SELECT id_commune,nom_commune_fr,nom_commune_ar
                                FROM commune  WHERE id_commune=" .$c;
                        $result = $conn->query($req);
                        if ($result->rowCount() > 0) {
                            while($row = $result->fetch()) {
                    
                                    echo  '<tr>
                                    
                                    <td>id commune</td> 
                             <td><input name="rang" readonly type="number" value="'. $row['id_commune'] .'"></td>
                             </tr>
                             <tr>
                                    <td>nom commune</td>      
                              <td><input name="q" type="text" value="'. $row['nom_commune_fr'] .'"></td>
                              </tr>
                              <tr>
                                    <td>nom commune en arabe</td>       
                             <td><input name="m" type="text" value="'. $row['nom_commune_ar'] .'"></td>
                             </tr>
                             ';
                                            }
                                            }
                                            } ?>
                                           
                                    </tbody>
                                </table>                    
    </div>

    <div class="container" style="background-color:#f1f1f1">
    <button type="submit" name="save" style="max-width:90px;margin-right:5px" onClick="valider()">valider</button>
      <button type="submit" name="sup" class="cancelbtn">suprimer commune</button>
      
    </div>
  </form>
</div>

 <!-- ajouter gouvernorat-->
 <div id="id04" class="modal">
  <form class="modal-content animate" action="http://localhost/priqh2/creategov.php?data=<?php echo $r ; ?>" method="post">
   
    <div class="imgcontainer">
      <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close">&times;</span>
      <h1>ajouter gouvernorat</h1>
    </div>

    <div class="container">
        
      <input type="text" placeholder="Enter le nom du gouvernorat" name="nom" required>
                            
    </div>

    <div class="container" style="background-color:#f1f1f1">
    <button type="submit" style="max-width:90px;margin-right:5px">valider</button>
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
  </form>
</div>
</div>
<script>
            //ajouter commune n'est pas terminer
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
</script>

    
                <footer class="tm-footer row tm-mt-small">
                    <div class="col-12 font-weight-light">
                        <p class="text-center text-white mb-0 px-4 small">
                            Copyright &copy; <b>2019</b> All rights reserved. 
                            
                        </p>
                    </div>
                </footer>
            </div>
           

                
            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/moment.min.js"></script>
            <script src="js/Chart.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/tooplate-scripts.js"></script>
        </body>

        </html>