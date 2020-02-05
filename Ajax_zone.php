<?php
 //  header('Content-type:text/html;charset=ISO-8859-1');
   $co=mysql_connect("localhost","root","");
   $dbnom="gestion_ccm";
   $db=mysql_select_db($dbnom,$co);
   $rch="WHERE 	id_municipalite ='".$_GET["tbl2"]."'";
   $res=mysql_query("SELECT * FROM zone ".$rch,$co);
   $max=@mysql_num_rows($res);
   
   $t="\t";   
   for ($nb=0;$nb<$max;$nb++)
   {  
   $i=mysql_result($res,$nb,"id_zone");
     $t.="\t".$i;
   $i=mysql_result($res,$nb,"nom_zone_fr");
     $t.="    :     ".$i;
	 $i=mysql_result($res,$nb,"nom_zone_ar");
     $t.="    :     " .$i;     
	}	 
	echo $t;
	mysql_close($co);
?>