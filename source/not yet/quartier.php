<?php
include("connection.php");
$connection=connect();
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

// Opens a connection to a MySQL server

if (!$connection) {
  die('Not connected : ' . mysql_error());
}



// Select all the rows in the markers table
$query = "SELECT * FROM qaurtier WHERE id_projet = " .$id_projet.";";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<quartiers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // Add to XML document node

$sql='select * from projet where id_projet = '.$row['id_projet'].';';
$row_gouv = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$res_gouv = mysql_fetch_array($row_gouv); 


  echo '<quartier ';
  echo 'id_projet="' . parseToXML($row['id_projet']) . '" ';
  echo 'rang_projet="' . parseToXML($res_gouv['rang_projet']) . '" ';
  echo 'id_quartier="' . $row['id_quartier'] . '" ';
   echo 'nom_quartier="' . $row['nom_quartier'] . '" ';
    echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
   echo '/>';
}

// End XML file
echo '</quartiers>';

?>