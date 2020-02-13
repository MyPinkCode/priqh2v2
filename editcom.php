<?php
session_start();

include("connection.php");
   
	$con=connect();
    $id=$_POST['id'];
	$fr=$_POST['fr'];
	$ar=$_POST['ar'];
	$gov=$_GET['data'];
	

    if($con){
		 if(isset($_POST['save'])){
		
		if(!(empty($_POST['fr']))){$req2="UPDATE commune SET nom_commune_fr='$fr' where id_commune='$id'";
			$res1=$con->exec($req2);}
	    if(!(empty($_POST['ar']))){$req2="UPDATE commune SET nom_commune_ar='$ar' where id_commune='$id'";
			$res1=$con->exec($req2);}
	
		

		
			header("location:http://localhost/priqh2/map.php?data=".$gov."&com=".$id);  
		
	}
	  if(isset($_POST['sup']))
  {
   
$req = "DELETE FROM commune where id_commune='$id'";
$res = $con->exec($req);
if ($res) {
	header("location:http://localhost/priqh2/map.php?data=".$gov."&com=".$id);  
}
  }
	
	}

?>