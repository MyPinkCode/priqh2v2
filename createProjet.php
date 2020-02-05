<?php
 $host="127.0.0.1";  $db_name="priqh2";  $db_user="root";  $db_password="";
try {

    $con = new PDO("mysql:dbname=$db_name;host=$host",$db_user,$db_password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// required data 
	$gouv=$_POST['gouv'];
	$rang=$_POST['rang'];
	$com=$_POST['com'];
	$mun=$_POST['mun'];

	//else
// define variables and set to empty values

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    
  if (empty($_POST["m"])) {
    $m = 0;
  } else {
	$m=$_POST['m'];
  }

  if (empty($_POST["q"])) {
    $q = 0;
  } else {
    $q=$_POST['q'];
  }

  if (empty($_POST["h"])) {
    $h = 0;
  } else {
	$h=$_POST['h'];
  }

  if (empty($_POST["superficie_quartier"])) {
    $superficie_quartier= 0;
  } else {
	$superficie_quartier=$_POST['superficie_quartier'];
  }

  if (empty($_POST["superficie_quartier_couvert"])) {
    $superficie_quartier_couvert = 0;
  } else {
	$superficie_quartier_couvert=$_POST['superficie_quartier_couvert'];
  }

  if (empty($_POST["rapport_superificie"])) {
    $rapport_superificie = 0;
  } else {
	$rapport_superificie=$_POST['rapport_superificie'];
  }

  if (empty($_POST["taux_habitation"])) {
    $taux_habitation = 0;
  } else {
	$taux_habitation=$_POST['taux_habitation'];
  }

  if (empty($_POST["rapport_depense_maison"])) {
    $rapport_depense_maison = 0;
  } else {
	$rapport_depense_maison=$_POST['rapport_depense_maison'];
  }

  if (empty($_POST["composante_projet"])) {
    $composante_projet = "null";
  } else {
	$composante_projet=$_POST['composante_projet'];
  }

  if (empty($_POST["assainissement_qte"])) {
    $assainissement_qte= 0;
  } else {
	$assainissement_qte=$_POST['assainissement_qte'];
  }

  if (empty($_POST["c"])) {
    $assainissement_cout= 0;
  } else {
	$assainissement_cout=$_POST['c'];
  }

  if (empty($_POST["assainissement_taux"])) {
    $assainissement_taux= 0;
  } else {
	$assainissement_taux=$_POST['assainissement_taux'];
  }

  if (empty($_POST["eclairage_public_qte"])) {
    $eclairage_public_qte= 0;
  } else {
	$eclairage_public_qte=$_POST['eclairage_public_qte'];
  }

  if (empty($_POST["eclairage_public_cout"])) {
	$eclairage_public_cout= 0;
  } else {
	$eclairage_public_cout=$_POST['eclairage_public_cout'];
  }

  if (empty($_POST["eclairage_public_taux"])) {
	$eclairage_public_taux= 0;
  } else {
	$eclairage_public_taux=$_POST['eclairage_public_taux'];
  }

  if (empty($_POST["voirie_qte"])) {
	$voirie_qte= 0;
  } else {
	$voirie_qte=$_POST['voirie_qte'];
  }

  if (empty($_POST["voirie_cout"])) {
	$voirie_cout= 0;
  } else {
	$voirie_cout=$_POST['voirie_cout'];
  }

  if (empty($_POST["voirie_taux"])) {
	$voirie_taux= 0;
  } else {
	$voirie_taux=$_POST['voirie_taux'];
  }

  if (empty($_POST["eau_potable_qte"])) {
	$eau_potable_qte= 0;
  } else {
	$eau_potable_qte=$_POST['eau_potable_qte'];
  }

  if (empty($_POST["eau_potable_cout"])) {
	$eau_potable_cout= 0;
  } else {
	$eau_potable_cout=$_POST['eau_potable_cout'];
  }

  if (empty($_POST["eau_potable_taux"])) {
	$eau_potable_taux= 0;
  } else {
	$eau_potable_taux=$_POST['eau_potable_taux'];
  }

  if (empty($_POST["drainage_qte"])) {
	$drainage_qte= 0;
  } else {
	$drainage_qte=$_POST['drainage_qte'];
  }

  if (empty($_POST["drainage_cout"])) {
	$drainage_cout= 0;
  } else {
	$drainage_cout=$_POST['drainage_cout'];
  }

  if (empty($_POST["drainage_taux"])) {
	$drainage_taux= 0;
  } else {
	$drainage_taux=$_POST['drainage_taux'];
  }

  if (empty($_POST["amel_habitat_qte"])) {
	$amel_habitat_qte= 0;
  } else {
	$amel_habitat_qte=$_POST['amel_habitat_qte'];
  }

  if (empty($_POST["amel_habitat_cout"])) {
	$amel_habitat_cout= 0;
  } else {
	$amel_habitat_cout=$_POST['amel_habitat_cout'];
  }

  if (empty($_POST["socio_collectif_cout"])) {
	$socio_collectif_cout= 0;
  } else {
	$socio_collectif_cout=$_POST['socio_collectif_cout'];
  }

  if (empty($_POST["industriel_cout"])) {
	$industriel_cout= 0;
  } else {
	$industriel_cout=$_POST['industriel_cout'];
  }

  if (empty($_POST["cout_total"])) {
	$cout_total= 0;
  } else {
	$cout_total=$_POST['cout_total'];
  }

  if (empty($_POST["type"])) {
	$type= "projet";
  } else {
	$type=$_POST['type'];
  }
}
    
		
            $req1="INSERT INTO projet (id_gouvernorat, rang_projet, id_commune, id_municipalite,
			 nombre_quartier, nombre_maison, nombre_habitant, superficie_quartier, superficie_quartier_couvert,
		rapport_superificie, taux_habitation, rapport_depense_maison, composante_projet, assainissement_qte,
		 assainissement_cout, assainissement_taux, eclairage_public_qte, eclairage_public_cout, eclairage_public_taux,
			 voirie_qte, voirie_cout, voirie_taux, eau_potable_qte, eau_potable_cout, eau_potable_taux,
			 drainage_qte, drainage_cout, drainage_taux, amel_habitat_qte, amel_habitat_cout, 
			 socio_collectif_cout, industriel_cout, cout_total, type)
			 VALUES($gouv, $rang, $com, $mun, $q, $m, $h, $superficie_quartier,
			$superficie_quartier_couvert,$rapport_superificie,$taux_habitation,$rapport_depense_maison
			,$composante_projet,$assainissement_qte,$assainissement_cout,$assainissement_taux,$eclairage_public_qte,
			$eclairage_public_cout,$eclairage_public_taux,$voirie_qte,$voirie_cout,$voirie_taux,$eau_potable_qte,
			$eau_potable_cout,$eau_potable_taux,$drainage_qte,$drainage_cout,$drainage_taux,$amel_habitat_qte,
			$amel_habitat_cout,$socio_collectif_cout,$industriel_cout,$cout_total,'$type')";
		   
		   $con->exec($req1);
		   if($req1)
			header("location:http://localhost/priqh2/map.php?data=".$gouv."&com=0");
		}
	catch(PDOException $e)
		{
		echo $req1 . "<br>" . $e->getMessage();
		}
	
	$con = null;
?>