<?xml version="1.0" encoding="UTF-8"?>
<projets>
<?php
include("connection.php");
$connection=connect();

// Select all the rows in the markers table
$query = "SELECT * FROM projet WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}


// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // Add to XML document node


$sql='select * from gouvernorat where id_gouvernorat = '.$row['id_gouvernorat'].';';
$row_gouv = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$res_gouv = mysql_fetch_array($row_gouv); 

$sql='select * from commune where id_commune = '.$row['id_commune'].';';
$row_com = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$res_com = mysql_fetch_array($row_com); 

$sql='select * from municipalite where id_municipalite = '.$row['id_municipalite'].';';
$row_mun = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$res_mun = mysql_fetch_array($row_mun); 


  echo '<projet ';
  echo 'id_projet="' . parseToXML($row['id_projet']) . '" ';
  echo 'rang_projet="' . parseToXML($row['rang_projet']) . '" ';
  echo 'id_gouvernorat=" Gouvernorat : ' . parseToXML($res_gouv['nom_gouvernorat_fr']) . '" ';
  echo 'id_commune=" Commune : ' . parseToXML($res_com['nom_commune_fr']) . '" ';
  echo 'id_municipalite=" Quartiers : ' . parseToXML($res_mun['nom_municipalite_fr']) . '" ';
  echo 'composante_projet=" مكونات المشروع : ' . parseToXML($row['composante_projet']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
   echo 'type="' . $row['type'] . '" ';
  echo 'nombre_maison=" عدد المساكن : ' . $row['nombre_maison'] . '" ';
  echo 'nombre_habitant= "عدد السكان : ' . $row['nombre_habitant'] . '" ';
  echo 'superficie_quartier_couvert= "ha المساحة المغطاة : ' . $row['superficie_quartier_couvert'] . ' " ';
  echo 'cout_total="MDT الجملة : ' . $row['cout_total'] . ' " ';
  echo 'image1="' . parseToXML($row['image1']) . '" ';
  echo 'image2="' . parseToXML($row['image2']) . '" ';
  echo 'image3="' . parseToXML($row['image3']) . '" ';
  echo 'image4="' . parseToXML($row['image4']) . '" ';  
  echo '/>';
}




?>
</projets>