<?php
function connect()
{
    $host="127.0.0.1";  $db_name="priqh2";  $db_user="root";  $db_password="";
	
	try{
		$con=new PDO("mysql:dbname=$db_name;host=$host",$db_user,$db_password);
		return $con;
	   }
    catch(Exception $e){"Error : $e->getMessage() </br>";
						echo "N : $e->getCode()"; 
					   return NULL;}
}
?>