<?xml version="1.0" encoding="UTF-8"?>
<quartiers>
<?php
header("Content-type: text/xml");
include("connection.php");
$conn=connect();
$id_projet=$_GET['id_projet'];
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


$req ="SELECT * FROM qaurtier WHERE id_projet = " .$id_projet.";";
$result = $conn->query($req);
   if ($result->rowCount() > 0) {

    while($row = $result->fetch()) {
$sql='select * from projet where id_projet = '.$row['id_projet'].';';
$res_gouv =  $conn->query($sql); 
$row_gouv =$res_gouv->fetch();


  echo '<quartier ';
  echo 'id_projet="' . parseToXML($row['id_projet']) . '" ';
  echo 'rang_projet="' . parseToXML($row_gouv['rang_projet']) . '" ';
  echo 'id_quartier="' . $row['id_quartier'] . '" ';
   echo 'nom_quartier="' . $row['nom_quartier'] . '" ';
    echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'image1="' . $row['image1'] . '" ';
  echo 'image2="' . $row['image2'] . '" ';
  echo 'image3="' . $row['image3'] . '" ';
  echo 'image4="' . $row['image4'] . '" ';
  echo 'image5="' . $row['image5'] . '" ';
   echo '/>';
}}
?>
</quartiers>