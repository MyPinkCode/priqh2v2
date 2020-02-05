<?xml version="1.0" encoding="UTF-8"?>
<mun>
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


$req ="SELECT * FROM municipalite WHERE 	id_commune = " .$id_gouv;
$result = $conn->query($req);
   if ($result->rowCount() > 0) {

    while($row = $result->fetch()) {

  echo '<municipalite> ';
  echo '<id_municipalite>' . parseToXML($row['id_municipalite']) . '</id_municipalite>';
  echo '<nom_municipalite_fr>' . parseToXML($row['nom_municipalite_fr']) . '</nom_municipalite_fr>';
   echo '</municipalite>';
}}
?>
</mun>