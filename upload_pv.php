<?php
include("session.php");
include("connexion.php");
include("Baniere.html");
$id_reunion_commission = $_GET['id_reunion_commission'];
$id_commission_marche = $_GET['id_commission_marche'];
$couleur=0;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
<div id="header" style="text-align:center; color:#104E8B;">
<label>Téléchargement PV</label>
</div>
<div id="body" style="text-align:center; color:#104E8B;">
	<form action="upload_pv_base.php?id_reunion_commission=<?php echo $id_reunion_commission; ?>&id_commission_marche=<?php echo $id_commission_marche; ?>" method="post" enctype="multipart/form-data">
	<input type="file" name="file" />
	<button type="submit" name="btn-upload">upload</button>
	</form>
    <br /><br />
    <?php
	if(isset($_GET['success']))
	{
		?>
        <label>File Uploaded Successfully... </label>
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>Problem While File Uploading !</label>
        <?php
	}
	else
	{
		?>
        <label>(PDF, DOC)</label>
        <?php
	}
	?>
</div>
<div class="footer" style="text-align:center;">
 <b>Copyright &copy; 2015 - Direction Informatique ARRU -
                <a href="http://www.arru.nat.tn" target="_blank">www.arru.nat.tn</a></b>

</div>
</body>
</html>