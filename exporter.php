<?php
include("connection.php");
$conn=connect();
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$htmlStr);
$xmlStr=str_replace('"','&quot;',$htmlStr);
$xmlStr=str_replace("'",'&#39;',$htmlStr);
$xmlStr=str_replace("&",'&amp;',$htmlStr);
return $xmlStr;
}
?>
<?xml version="1.0" encoding="UTF-8"?>
<projets>
<?php
$id=1;
if($_GET['data']!=0){$id="id_gouvernorat=".$_GET['data'];}
header("Content-type: text/xml");
$req ="SELECT * FROM projet WHERE ".$id;
$result = $conn->query($req);
   if ($result->rowCount() > 0) {

    while($row = $result->fetch()) {
$sql='select * from gouvernorat where id_gouvernorat = '.$row['id_gouvernorat'].';';
$res_gouv =  $conn->query($sql); 
$row_gouv =$res_gouv->fetch();

$sql='select * from commune where id_commune = '.$row['id_commune'].';';
$res_com = $conn->query($sql); 
$row_com =$res_com->fetch();

$sql='select * from municipalite where id_municipalite = '.$row['id_municipalite'].';';
$res_mun =$conn->query($sql); 
$row_mun = $res_mun->fetch();




  echo '<projet ';
  echo 'id_projet="' . parseToXML($row['id_projet']) . '" ';
  echo 'rang_projet="' . parseToXML($row['rang_projet']) . '" ';
  echo 'id_gouvernorat=" Gouvernorat : ' . parseToXML($row_gouv['nom_gouvernorat_fr']) . '" ';
  echo 'id_commune=" Commune : ' . parseToXML($row_com['nom_commune_fr']) . '" ';
  echo 'id_municipalite=" Quartiers : ' . parseToXML($row_mun['nom_municipalite_fr']) . '" ';
  echo 'composante_projet=" مكونات المشروع : ' . parseToXML($row['composante_projet']) . '" ';
   echo 'type="' . $row['type'] . '" ';
  echo 'nombre_maison=" عدد المساكن : ' . $row['nombre_maison'] . '" ';
  echo 'nombre_habitant= "عدد السكان : ' . $row['nombre_habitant'] . '" ';
  echo 'superficie_quartier_couvert= "ha المساحة المغطاة : ' . $row['superficie_quartier_couvert'] . ' " ';
  echo 'cout_total="MDT الجملة : ' . $row['cout_total'] . ' " ';
  
  echo '/>';
}

   }


?>
</projets>