<?xml version="1.0" encoding="UTF-8"?>
<points>
<?php
header("Content-type: text/xml");
include("connection.php");
$connection=connect();
$id_quartier=$_GET['id_quartier'];
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

$req = "SELECT * FROM limite_quartier WHERE id_quartier = " .$id_quartier.";";
$result =$connection->query($req);
   if ($result->rowCount() > 0) {

    while($row = $result->fetch()) {

  echo '<point ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo '/>';
}}

?>
</points>