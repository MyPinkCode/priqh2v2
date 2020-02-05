<?php
include("connection.php");
	$con=connect();
	

	$nom=$_POST['nom'];
	$gov=$_GET['data'];
    if($con){
		
            $req1="INSERT INTO gouvernorat (id_gouvernorat,nom_gouvernorat_fr) 
            VALUES ('$gov', '$nom')";
		    $res1=$con->exec($req1);
            if($req1){
			header("location:http://localhost/ARRU/map.php?data=".$gov."&com=0"); 
            }
		
		
	}
?>