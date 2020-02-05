<?xml version="1.0" encoding="UTF-8"?>
<com>
<?php
header("Content-type: text/xml");
include("connection.php");
$conn=connect();
$id_gouv=$_GET["tbl2"];
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


$req ="SELECT * FROM commune WHERE 	id_gouvernorat = " .$id_gouv;
$result = $conn->query($req);
   if ($result->rowCount() > 0) {

    while($row = $result->fetch()) {

  echo '<commune> ';
  echo '<id_commune>' . parseToXML($row['id_commune']) . '</id_commune>';
  echo '<nom_commune_fr>' . parseToXML($row['nom_commune_fr']) . '</nom_commune_fr>';
   echo '</commune>';
}}
?>
</com>