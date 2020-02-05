<?php
include("session.php");
include("connexion.php");
include("Baniere.html");
$id_reunion_commission = $_GET['id_reunion_commission'];
$id_commission_marche = $_GET['id_commission_marche'];
$couleur=0;
if(isset($_POST['btn-upload']))
{    
     
	$file = $id_reunion_commission."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql='update reunion_commission set fichier_pv = "'. $final_file .'" where id_reunion_commission = "'.$id_reunion_commission.'";';
		mysql_query($sql);
		?>
		<script>
		alert('successfully uploaded');
		</script>
		<?php
		header('Location: Afficher_reunion.php?id_commission_marche='.$id_commission_marche.'');
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        </script>
		<?php
				 header('Location: upload_pv.php?id_reunion_commission='.$id_reunion_commission.'&id_commission_marche='.$id_commission_marche.'');

	}
}
?>