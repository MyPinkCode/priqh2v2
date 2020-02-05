<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>home</title>
    <link rel="icon" href="source/icon.png">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="script/script.js"></script>
        <?php
                    session_start();
                    include("connection.php");

                    if (!isset($_SESSION['id'])) { header("location:login.php"); } 
                    
                    $c=0;
                ?>
    </head>

<body>

      <div id="navBar">
        <h1>Gestion des projets -ARRU-</h1>
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
      </div>


      <!--  Header  -->
      <header id="front">
        <img id="bg-photo" src="source/b.jpg" alt="Alex Loomer Photo" />
      </header>

  

     
        <footer> Copyright &copy; <b>2020</b> All rights reserved. </footer>
        </html>