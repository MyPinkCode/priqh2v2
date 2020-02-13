<?php
session_start();

include("connection.php");
   
	$con=connect();
    $id=$_POST['id'];
	$fr=$_POST['fr'];
	$ar=$_POST['ar'];
	
	

    if($con){
		 if(isset($_POST['save'])){
		
		if(!(empty($_POST['fr']))){$req2="UPDATE gouvernorat SET nom_gouvernorat_fr='$fr' where id_gouvernorat='$id'";
			$res1=$con->exec($req2);}
	    if(!(empty($_POST['ar']))){$req2="UPDATE gouvernorat SET nom_gouvernorat_ar='$ar' where id_gouvernorat='$id'";
			$res1=$con->exec($req2);}
	
		

		
			header("location:http://localhost/priqh2/map.php?data=".$id."&com=0");  
		
	}
	  if(isset($_POST['sup']))
  {
   
$req = "DELETE FROM gouvernorat where id_gouvernorat='$id'";
$res = $con->exec($req);
if ($res) {
	header("location:http://localhost/priqh2/map.php?data=".$id."&com=0");  
}
  }
	
	}

?>