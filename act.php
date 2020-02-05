<?php
session_start();

include("connection.php");
if (!isset($_SESSION['id'])) { header("location:login.php"); } 
	$con=connect();
    $r=$_POST['rang'];
    $q=$_POST['q'];
    $m=$_POST['m'];
    $h=$_POST['h'];
    $c=$_POST['c'];
    if($con){
        
       if(!(empty($_POST['rang']))){$req1="UPDATE projet SET rang_projet=$r where id_projet=".$_POST['id'];
           $res1=$con->exec($req1);}
       if(!(empty($_POST['q']))){$req2="UPDATE projet SET nombre_quartier=$q where id_projet=".$_POST['id'];
           $res1=$con->exec($req2);}
       if(!(empty($_POST['m']))){$req2="UPDATE projet SET nombre_maison=$m where id_projet=".$_POST['id'];
           $res1=$con->exec($req2);}
       if(!(empty($_POST['h']))){$req2="UPDATE projet SET nombre_habitant=$h where id_projet=".$_POST['id'];
               $res1=$con->exec($req2);}
       if(!(empty($_POST['c']))){$req2="UPDATE projet SET assainissement_cout=$c where id_projet=".$_POST['id'];
                   $res1=$con->exec($req2);}
       

       
           header("location:http://localhost/ARRU/map.php?data=0");  
       
       }
?>
   