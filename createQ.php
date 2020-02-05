<?php
 $host="127.0.0.1";  $db_name="priqh2";  $db_user="root";  $db_password="";
try {

    $con = new PDO("mysql:dbname=$db_name;host=$host",$db_user,$db_password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// required data 
	$name=$_POST['name'];
	$projet=$_POST['projet'];
	$pinlat=$_POST['pinlat'];
    $pinlon=$_POST['pinlon'];
    $coordsnum=$_POST['coordsnum']-1;
    $nbr=$_POST['nbr'];
    $img = array();
    $r="";
    $v="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($x =1; $x <=$nbr; $x++) {
        if (empty($_POST["i".$x])) {
          $img[$x]=" ";
        } else {
          $img[$x]=$_POST["i".$x];
        }
        $r=$r.",image".$x;
        $v=$v.",'$img[$x]'";
  }
}
		//insert quartier
            $req1="INSERT INTO qaurtier(id_projet, nom_quartier, lat, lng".$r.") 
            VALUES ($projet,'$name',$pinlat,$pinlon".$v.")";
       $con->exec($req1);

       //get id_quartier
       $sql="SELECT id_quartier FROM qaurtier ORDER BY id_quartier DESC LIMIT 1";
       $result = $con->query($sql);
if ($result->rowCount() > 0) {
    $row = $result->fetch();
     $id=$row["id_quartier"];
}
//insert limite quartier
       for ($x =1; $x <=$coordsnum; $x++) {
        $lat=$_POST['polylat'.$x];
        $lon=$_POST['polylon'.$x];
        $req="INSERT INTO limite_quartier(id_quartier, lat, lng)
         VALUES ($id,$lat,$lon)";
         $con->exec($req);
    }
			
		}
	catch(PDOException $e)
		{
		echo $req1 . "<br>" . $e->getMessage();
		}
    header("LOCATION: http://localhost/priqh2/geo.php?data=0");
	$con = null;
?>