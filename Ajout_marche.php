<?php
session_start();
include("connection.php");

if (!isset($_SESSION['id'])) { header("location:login.php"); } 

?>
<HTML>
<head>
<style type="text/css">
.sample {
	border-width: 1px;
	padding: 1px;
	border-style: outset;
	background-color: #DDDDDD;
}
.table {
	border-width: 0px;
	border-spacing: 0px;
	border-style: outset;
	border-collapse: separate;
	background-color: #CC0000;
}
.boutton {
	width:100px; 
    height:30px; 
    text-decoration:none; 
    color:white;
    text-align:center; 
    font-weight:bold; 
    background-color:#C0C0C0;
    padding:5px;
}
.centre
{
width:100%;
height: 200px;
overflow:auto;
border: 0px solid #000000;
}
</style>
<link href="style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<BODY BGCOLOR=#FFFFFF LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>


  
  <?php
if(isset($_POST['confirmation'])){

$numero_AO=trim($_POST['numero_AO']); 
$nom_projet_fr=trim($_POST['nom_projet_fr']);
$nom_projet_ar=trim($_POST['nom_projet_ar']); 
$id_person_arru=trim($_POST['id_person_arru']);
$id_type_dossier_marche=trim($_POST['id_type_dossier_marche']);
$id_type_ao=trim($_POST['id_type_ao']);
$id_programme_arru=trim($_POST['id_programme_arru']);
$id_gouvernorat=trim($_POST['id_gouvernorat']); 
$id_commune=trim($_POST['id_commune']); 
$id_municipalite=trim($_POST['id_municipalite']); 
$id_zone=trim($_POST['id_zone']);
$date_publication_AO=trim($_POST['date_publication_AO']);
$date_limite_AO=trim($_POST['date_limite_AO']);
$heure_limite_AO=trim($_POST['heure_limite_AO']);
$duree_publication=trim($_POST['duree_publication']);
//$duree_publication_legal=trim($_POST['duree_publication_legal']);
$nombre_dossier_retirer_arru=trim($_POST['nombre_dossier_retirer_arru']);
$nombre_dossier_retirer_tuneps=trim($_POST['nombre_dossier_retirer_tuneps']);
$nombre_societe_particpe_arru=trim($_POST['nombre_societe_particpe_arru']);
$nombre_societe_particpe_tuneps=trim($_POST['nombre_societe_particpe_tuneps']);
$nombre_plie_ouvert_arru=trim($_POST['nombre_plie_ouvert_arru']);
$nombre_plie_ouvert_tuneps=trim($_POST['nombre_plie_ouvert_tuneps']);
$date_ouverture_plie=trim($_POST['date_ouverture_plie']);
$heure_ouverture_plie=trim($_POST['heure_ouverture_plie']);
$duree_validite_offre=trim($_POST['duree_validite_offre']);
$duree_contractuel=trim($_POST['duree_contractuel']);
$mnt_offre_administration=trim($_POST['mnt_offre_administration']);
$mnt_moyen_offre=trim($_POST['mnt_moyen_offre']);
$condition_AO=str_replace( "\n", '<br />',trim($_POST['condition_AO']));
$id_type_societe=trim($_POST['id_type_societe']);
$id_methode_marche=trim($_POST['id_methode_marche']);
$id_methode_dep=trim($_POST['id_methode_dep']);
$id_type_prix=trim($_POST['id_type_prix']);
$duree_validite_caution_provis=trim($_POST['duree_validite_caution_provis']);
$date_caution_provis=trim($_POST['date_caution_provis']);
$id_categorie_prix=trim($_POST['id_categorie_prix']);

$test=0;

if(($numero_AO=="")&&($nom_projet_fr!="")){
$test=1;// le champ nom est vide
}


if(($numero_AO!="")&&($nom_projet_fr=="")){
$test=2;// le ID_srchitect est null
}


if(($numero_AO=="")&&($nom_projet_fr=="")){
$test=3;// le deux champ sont vides
}

if(($duree_validite_caution_provis=="")&&($date_caution_provis=="")){
$test=7;// le deux champ sont vides
}

if(($duree_validite_caution_provis!="")&&($date_caution_provis=="")){
$test=8;// le deux champ sont vides
}

if(($duree_validite_caution_provis=="")&&($date_caution_provis!="")){
$test=9;// le deux champ sont vides
}


if(($numero_AO!="")&&($nom_projet_fr!="")&&($date_caution_provis!="")&&($duree_validite_caution_provis!=""))
{

 //mysql_query("SET NAMES 'utf8'");
 
$sql='select count(*) from dossier_marche where numero_AO like "' . $numero_AO. '";';
$result = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$row = mysql_fetch_array($result); 
if($row['count(*)']>0)
{
$test=4 ;//le matricule exist deja
}
else 
{
$sql='select count(*) from dossier_marche where nom_projet_fr like "' . $nom_projet_fr. '";';
$result = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$row = mysql_fetch_array($result); 
if($row['count(*)']>0)
{
$test=5 ;//le nom personnel_arru exist deja
}
else{
$sql='insert into dossier_marche(numero_AO,nom_projet_fr,nom_projet_ar,duree_validite_caution_provis,date_caution_provis,id_person_arru,id_type_dossier_marche,id_programme_arru,id_zone,id_municipalite,id_commune,id_gouvernorat,id_type_ao,date_publication_AO,date_limite_AO,heure_limite_AO,duree_publication,nombre_dossier_retirer_arru,nombre_dossier_retirer_tuneps,nombre_societe_particpe_arru,nombre_societe_particpe_tuneps,nombre_plie_ouvert_arru,nombre_plie_ouvert_tuneps,date_ouverture_plie,heure_ouverture_plie,duree_validite_offre,mnt_offre_administration,mnt_moyen_offre,duree_contractuel,condition_AO,id_type_societe,id_methode_marche,id_methode_dep,id_type_prix,id_categorie_prix) values ("'.$numero_AO.'","'.$nom_projet_fr.'","'.$nom_projet_ar.'","'.$duree_validite_caution_provis.'","'.$date_caution_provis.'","'.$id_person_arru.'","'.$id_type_dossier_marche.'","'.$id_programme_arru.'","'.$id_zone.'","'.$id_municipalite.'","'.$id_commune.'","'.$id_gouvernorat.'","'.$id_type_ao.'","'.$date_publication_AO.'","'.$date_limite_AO.'","'.$heure_limite_AO.'","'.$duree_publication.'","'.$nombre_dossier_retirer_arru.'","'.$nombre_dossier_retirer_tuneps.'","'.$nombre_societe_particpe_arru.'","'.$nombre_societe_particpe_tuneps.'","'.$nombre_plie_ouvert_arru.'","'.$nombre_plie_ouvert_tuneps.'","'.$date_ouverture_plie.'","'.$heure_ouverture_plie.'","'.$duree_validite_offre.'","'.$mnt_offre_administration.'","'.$mnt_moyen_offre.'","'.$duree_contractuel.'","'.$condition_AO.'","'.$id_type_societe.'","'.$id_methode_marche.'","'.$id_methode_dep.'","'.$id_type_prix.'","'.$id_categorie_prix.'")';
$result1 = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br/>'.mysql_error());

}
}

}

switch($test){
case 0 : {
         
		  header('Location: Afficher_marche.php');  // forward to accueil.php after insertion
          }
break;	
case 1 : {
          ?>
		  <br><br>
          <table align="center" style="border-color:#8D0401" width="30%" cellspacing="0" border="1">
          <tr><td>
          <div style="color:#8D0401" align="center"><br>
          Le champ nom personnel est vide<br>
           <a href="Ajout_marche.php" style="color:#8D0401; text-decoration:none">[ Retour]</a>&nbsp 
           <a href="Accueil_Parametrage.php" style="color:#8D0401; text-decoration:none" >[Afficher parametres]</a>
          
          </div><br>
          </td>
          </tr></table>
          <?php
		  }
break;			  
case 2: {
          ?>
		  <br><br>
          <table align="center" style="border-color:#8D0401" width="30%" cellspacing="0" border="1">
          <tr><td>
          <div style="color:#8D0401" align="center"><br>
       Le champ Matricule est vide<br>
           <a href="Ajout_marche.php" style="color:#8D0401; text-decoration:none">[ Retour]</a>&nbsp 
           <a href="Accueil_Parametrage.php" style="color:#8D0401; text-decoration:none" >[Afficher parametres]</a>
          
          </div><br>
          </td>
          </tr></table>
          <?php
         }
break;			 
case 3: {
          ?>
		  <br><br>
          <table align="center" style="border-color:#8D0401" width="30%" cellspacing="0" border="1">
          <tr><td>
          <div style="color:#8D0401" align="center"><br>
       Les  deux champs sont vides<br>
           <a href="Ajout_marche.php" style="color:#8D0401; text-decoration:none">[ Retour]</a>&nbsp 
           <a href="Accueil_Parametrage.php" style="color:#8D0401; text-decoration:none" >[Afficher parametres]</a>
          
          </div><br>
          </td>
          </tr></table>
          <?php
         }
break;	


case 4: {
          ?>
		  <br><br>
          <table align="center" style="border-color:#8D0401" width="30%" cellspacing="0" border="1">
          <tr><td>
          <div style="color:#8D0401" align="center"><br>
       Le marcilue exist d&eacutej&agrave <br>
           <a href="Ajout_marche.php" style="color:#8D0401; text-decoration:none">[ Retour]</a>&nbsp 
           <a href="Accueil_Parametrage.php" style="color:#8D0401; text-decoration:none" >[Afficher parametres]</a>
          
          </div><br>
          </td>
          </tr></table>
          <?php
         }
break;	
case 5: {
          ?>
		  <br><br>
          <table align="center" style="border-color:#8D0401" width="30%" cellspacing="0" border="1">
          <tr><td>
          <div style="color:#8D0401" align="center"><br>
       Le nom du personnel existe d&eacutej&agrave <br>
           <a href="Ajout_marche.php" style="color:#8D0401; text-decoration:none">[ Retour]</a>&nbsp 
           <a href="Accueil_Parametrage.php" style="color:#8D0401; text-decoration:none" >[Afficher parametres]</a>
          
          </div><br>
          </td>
          </tr></table>
          <?php
         }
break;	
case 7: {
          ?>
		  <br><br>
          <table align="center" style="border-color:#8D0401" width="30%" cellspacing="0" border="1">
          <tr><td>
          <div style="color:#8D0401" align="center"><br>
      Les  deux champs sont vides <br>
           <a href="Ajout_marche.php" style="color:#8D0401; text-decoration:none">[ Retour]</a>&nbsp 
           <a href="Accueil_Parametrage.php" style="color:#8D0401; text-decoration:none" >[Afficher parametres]</a>
          
          </div><br>
          </td>
          </tr></table>
          <?php
         }
break;	case 8: {
          ?>
		  <br><br>
          <table align="center" style="border-color:#8D0401" width="30%" cellspacing="0" border="1">
          <tr><td>
          <div style="color:#8D0401" align="center"><br>
       Le  champs caution vide <br>
           <a href="Ajout_marche.php" style="color:#8D0401; text-decoration:none">[ Retour]</a>&nbsp 
           <a href="Accueil_Parametrage.php" style="color:#8D0401; text-decoration:none" >[Afficher parametres]</a>
          
          </div><br>
          </td>
          </tr></table>
          <?php
         }
break;	case 9: {
          ?>
		  <br><br>
          <table align="center" style="border-color:#8D0401" width="30%" cellspacing="0" border="1">
          <tr><td>
          <div style="color:#8D0401" align="center"><br>
       Le  champs caution vide<br>
           <a href="Ajout_marche.php" style="color:#8D0401; text-decoration:none">[ Retour]</a>&nbsp 
           <a href="Accueil_Parametrage.php" style="color:#8D0401; text-decoration:none" >[Afficher parametres]</a>
          
          </div><br>
          </td>
          </tr></table>
          <?php
         }
break;			 		 
}


}

else{
  ?>
  <form  name="form"  method="post" action="Ajout_marche.php" onSubmit="return validation()">
 <div style="text-align:center;color:#1874CD;"><font size="5"><b>إضافة طلب عروض</b></font></div><br>
 <table align="center"  border="1"  cellspacing="0"  width="55%" >
     <tr> 
       <TD><br> 
   <table align="center" width="98%">
   	<tr> 
	   <TD width="16%"><B>Numéro Appel d'offre</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="numero_AO"  id="numero_AO" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
		<tr> 
	   <TD width="16%"><B>Type Appel d'offre</B></TD>
	    <TD width="20%">
	    <select  name="id_type_ao" id="id_type_ao" >
<option></option>
<?php
   $res=mysql_query("SELECT * FROM type_ao",$base);
   $max=@mysql_num_rows($res); 
   for ($nb=0;$nb<$max;$nb++)
   {  
   $nom_type_ao_fr=mysql_result($res,$nb,'nom_type_ao_fr');
   $nom_type_ao_ar=mysql_result($res,$nb,'nom_type_ao_ar');   
   $id_type_ao=mysql_result($res,$nb,'id_type_ao');
      echo '<option value='.$id_type_ao.'>'.$nom_type_ao_fr.'     ::    '.$nom_type_ao_ar.'</option>';   
	}
   ?>  
 </select>
	    </TD>
		</tr> 
			<tr> 
	   <TD width="16%"><B>Type Projet</B></TD>
	    <TD width="20%">
	    <select  name="id_type_dossier_marche" id="id_type_dossier_marche" >
<option></option>
<?php
   $res=mysql_query("SELECT * FROM type_dossier_marche",$base);
   $max=@mysql_num_rows($res); 
   for ($nb=0;$nb<$max;$nb++)
   {  
   $nom_type_dossier_marche_fr=mysql_result($res,$nb,'nom_type_dossier_marche_fr');
   $nom_type_dossier_marche_ar=mysql_result($res,$nb,'nom_type_dossier_marche_ar');   
   $id_type_dossier_marche=mysql_result($res,$nb,'id_type_dossier_marche');
      echo '<option value='.$id_type_dossier_marche.'>'.$nom_type_dossier_marche_fr.'     ::    '.$nom_type_dossier_marche_ar.'</option>';   
	}
   ?>  
 </select>
	    </TD>
		</tr>
	<tr> 
	   <TD width="16%"><B>Programme</B></TD>
	    <TD width="20%">
	    <select  name="id_programme_arru" id="id_programme_arru" >
<option></option>
<?php
   $res=mysql_query("SELECT * FROM programme_arru",$base);
   $max=@mysql_num_rows($res); 
   for ($nb=0;$nb<$max;$nb++)
   {  
   $nom_programme_arru_fr=mysql_result($res,$nb,'nom_programme_arru_fr');
   $nom_programme_arru_ar=mysql_result($res,$nb,'nom_programme_arru_ar');  
   $abbreviation=mysql_result($res,$nb,'abbreviation');    
   $id_programme_arru=mysql_result($res,$nb,'id_programme_arru');
      echo '<option value='.$id_programme_arru.'>'.$abbreviation.'     ::    '.$nom_programme_arru_fr.'     ::    '.$nom_programme_arru_ar.'</option>';   
	}
   ?>  
 </select>
	    </TD>
		</tr> 		
		<tr> 
	   <TD width="16%"><B>Nom du Projet</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="nom_projet_fr"  id="nom_projet_fr" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
			<tr> 
	   <TD width="16%"><B>إسم المشروع</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="nom_projet_ar"  id="nom_projet_ar" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>	
      <tr> 
	   <TD width="16%"><B>Gouvernorat</B></TD>
	    <TD width="20%">
	    <select  name="id_gouvernorat" id="id_gouvernorat" onchange='appel();'>
<option></option>
<?php
   $res=mysql_query("SELECT * FROM gouvernorat",$base);
   $max=@mysql_num_rows($res); 
   for ($nb=0;$nb<$max;$nb++)
   {  
   $nom_gouvernorat_fr=mysql_result($res,$nb,'nom_gouvernorat_fr');
   $nom_gouvernorat_ar=mysql_result($res,$nb,'nom_gouvernorat_ar');   
   $id_gouvernorat=mysql_result($res,$nb,'id_gouvernorat');
      echo '<option value='.$id_gouvernorat.'>'.$nom_gouvernorat_fr.'     ::    '.$nom_gouvernorat_ar.'</option>';   
	}
   ?>  
 </select>
	    </TD>
		</tr> 
		<tr> 
	   <TD width="16%"><B>Commune</B></TD>
	    <TD width="20%">
<select name="id_commune" id="id_commune" onchange='appel1();'></a>
	   <option value="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </option>
      </select>
	  </TD>
		</tr>
		
		<tr> 
	   <TD width="16%"><B>Municipalité</B></TD>
	    <TD width="20%">
<select name="id_municipalite" id="id_municipalite" onchange='appel2();'></a>
	   <option value="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </option>
      </select>
	  </TD>
		</tr>
		<tr> 
	   <TD width="16%"><B>Zone</B></TD>
	    <TD width="20%">
<select name="id_zone" id="id_zone" ></a>
	   <option value="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </option>
      </select>
	  </TD>
		</tr>
		<tr> 
	   <TD width="16%"><B>Responsable</B></TD>
	    <TD width="20%">
	    <select  name="id_person_arru" id="id_person_arru" >
<option></option>
<?php
   $res=mysql_query("SELECT * FROM personnel_arru",$base);
   $max=@mysql_num_rows($res); 
   for ($nb=0;$nb<$max;$nb++)
   {  
   $nom_person_arru_fr=mysql_result($res,$nb,'nom_person_arru_fr');
   $nom_person_arru_ar=mysql_result($res,$nb,'nom_person_arru_ar');   
   $id_person_arru=mysql_result($res,$nb,'id_person_arru');
      echo '<option value='.$id_person_arru.'>'.$nom_person_arru_fr.'     ::    '.$nom_person_arru_ar.'</option>';   
	}
   ?>  
 </select>
	    </TD>
		</tr> 
	<tr> 
	   <TD width="16%"><B>تاريخ الإعلان عن المنافسة</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="date_publication_AO"  id="date_publication_AO" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>		
		<tr> 
	   <TD width="16%"><B> تاريخ أخر أجل لقبول العروض</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="date_limite_AO"  id="date_limite_AO" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
		<tr> 
	   <TD width="16%"><B> ساعة أخر أجل لقبول العروض</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="heure_limite_AO"  id="heure_limite_AO" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
		<tr> 
	   <TD width="16%"><B> duree_publication</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="duree_publication"  id="duree_publication" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
		<tr> 
	   <TD width="16%"><B> nombre_dossier_retirer_arru</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="nombre_dossier_retirer_arru"  id="nombre_dossier_retirer_arru" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
		<tr> 
	   <TD width="16%"><B> nombre_dossier_retirer_tuneps</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="nombre_dossier_retirer_tuneps"  id="nombre_dossier_retirer_tuneps" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
		<tr> 
	   <TD width="16%"><B> nombre_societe_particpe_arru</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="nombre_societe_particpe_arru"  id="nombre_societe_particpe_arru" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
		<tr> 
	   <TD width="16%"><B> nombre_societe_particpe_tuneps</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="nombre_societe_particpe_tuneps"  id="nombre_societe_particpe_tuneps" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
		<tr> 
	   <TD width="16%"><B> nombre_plie_ouvert_arru</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="nombre_plie_ouvert_arru"  id="nombre_plie_ouvert_arru" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
		<tr> 
	   <TD width="16%"><B> nombre_plie_ouvert_tuneps</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="nombre_plie_ouvert_tuneps"  id="nombre_plie_ouvert_tuneps" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
		
		
		
		
		<tr> 
	   <TD width="16%"><B> date_ouverture_plie</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="date_ouverture_plie"  id="date_ouverture_plie" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr><tr> 
	   <TD width="16%"><B> heure_ouverture_plie</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="heure_ouverture_plie"  id="heure_ouverture_plie" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr><tr> 
	   <TD width="16%"><B> duree_validite_offre</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="duree_validite_offre"  id="duree_validite_offre" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr><tr> 
	   <TD width="16%"><B> mnt_offre_administration</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="mnt_offre_administration"  id="mnt_offre_administration" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
		<tr> 
	   <TD width="16%"><B> mnt_moyen_offre</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="mnt_moyen_offre"  id="mnt_moyen_offre" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
		
		
		
		<tr> 
	   <TD width="16%"><B> duree_contractuel</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="duree_contractuel"  id="duree_contractuel" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr><tr> 
	   <TD width="16%"><B> condition_AO</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="condition_AO"  id="condition_AO" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
		
		
		
		
		
		
		<tr> 
	   <TD width="16%"><B>type_societe</B></TD>
	    <TD width="20%">
	    <select  name="id_type_societe" id="id_type_societe" >
<option></option>
<?php
   $res=mysql_query("SELECT * FROM type_societe",$base);
   $max=@mysql_num_rows($res); 
   for ($nb=0;$nb<$max;$nb++)
   {  
   $nom_type_societe_fr=mysql_result($res,$nb,'nom_type_societe_fr');
   $nom_type_societe_ar=mysql_result($res,$nb,'nom_type_societe_ar');   
   $id_type_societe=mysql_result($res,$nb,'id_type_societe');
      echo '<option value='.$id_type_societe.'>'.$nom_type_societe_fr.'     ::    '.$nom_type_societe_ar.'</option>';   
	}
   ?>  
 </select>
	    </TD>
		</tr> 
		
		<tr> 
	   <TD width="16%"><B>methode_marche</B></TD>
	    <TD width="20%">
	    <select  name="id_methode_marche" id="id_methode_marche" >
<option></option>
<?php
   $res=mysql_query("SELECT * FROM methode_marche",$base);
   $max=@mysql_num_rows($res); 
   for ($nb=0;$nb<$max;$nb++)
   {  
   $nom_methode_marche_fr=mysql_result($res,$nb,'nom_methode_marche_fr');
   $nom_methode_marche_ar=mysql_result($res,$nb,'nom_methode_marche_ar');   
   $id_methode_marche=mysql_result($res,$nb,'id_methode_marche');
      echo '<option value='.$id_methode_marche.'>'.$nom_methode_marche_fr.'     ::    '.$nom_methode_marche_ar.'</option>';   
	}
   ?>  
 </select>
	    </TD>
		</tr> 
		
		<tr> 
	   <TD width="16%"><B>methode_depouillement</B></TD>
	    <TD width="20%">
	    <select  name="id_methode_dep" id="id_methode_dep" >
<option></option>
<?php
   $res=mysql_query("SELECT * FROM methode_dep",$base);
   $max=@mysql_num_rows($res); 
   for ($nb=0;$nb<$max;$nb++)
   {  
   $nom_methode_dep_fr=mysql_result($res,$nb,'nom_methode_dep_fr');
   $nom_methode_dep_ar=mysql_result($res,$nb,'nom_methode_dep_ar');   
   $id_methode_dep=mysql_result($res,$nb,'id_methode_dep');
      echo '<option value='.$id_methode_dep.'>'.$nom_methode_dep_fr.'     ::    '.$nom_methode_dep_ar.'</option>';   
	}
   ?>  
 </select>
	    </TD>
		</tr>

<tr> 
	   <TD width="16%"><B>type_prix</B></TD>
	    <TD width="20%">
	    <select  name="id_type_prix" id="id_type_prix" >
<option></option>
<?php
   $res=mysql_query("SELECT * FROM type_prix",$base);
   $max=@mysql_num_rows($res); 
   for ($nb=0;$nb<$max;$nb++)
   {  
   $nom_type_prix_fr=mysql_result($res,$nb,'nom_type_prix_fr');
   $nom_type_prix_ar=mysql_result($res,$nb,'nom_type_prix_ar');   
   $id_type_prix=mysql_result($res,$nb,'id_type_prix');
      echo '<option value='.$id_type_prix.'>'.$nom_type_prix_fr.'     ::    '.$nom_type_prix_ar.'</option>';   
	}
   ?>  
 </select>
	    </TD>
		</tr>		
	<tr> 
	   <TD width="16%"><B>categorie_prix</B></TD>
	    <TD width="20%">
	    <select  name="id_categorie_prix" id="id_categorie_prix" >
<option></option>
<?php
   $res=mysql_query("SELECT * FROM categorie_prix",$base);
   $max=@mysql_num_rows($res); 
   for ($nb=0;$nb<$max;$nb++)
   {  
   $nom_categorie_prix_fr=mysql_result($res,$nb,'nom_categorie_prix_fr');
   $nom_categorie_prix_ar=mysql_result($res,$nb,'nom_categorie_prix_ar');   
   $id_categorie_prix=mysql_result($res,$nb,'id_categorie_prix');
      echo '<option value='.$id_categorie_prix.'>'.$nom_categorie_prix_fr.'     ::    '.$nom_categorie_prix_ar.'</option>';   
	}
   ?>  
 </select>
	    </TD>
		</tr>
<tr> 
	   <TD width="16%"><B>تاريخ الضمان الوقتي</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="date_caution_provis"  id="date_caution_provis" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>			
		
		<tr> 
	   <TD width="16%"><B> أجال الضمان الوقتي</B></TD>
	    <TD width="20%">
	    <INPUT type="text" name="duree_validite_caution_provis"  id="duree_validite_caution_provis" STYLE="color:#0000FF;" value=""> 
	    </TD>
		</tr>
		
		
		<tr><td align="center" colspan="4">
		<br>
	    <INPUT type="submit" name="confirmation" value="confirmer">
		<input type="reset" name="annuler" value="annuler">
 		</td></tr>
		</table></TD></tr></table>
		
		
		
		 <table><br><tr><td width="79%"></td><td>
 <a href="Ajout_marche.php" style="color:#336600; text-decoration:none"><INPUT type="button" name="retour" class="boutton" value="retour"></a>
  <a href="Accueil_Parametrage.php" style="color:#336600; text-decoration:none"><INPUT type="button" class="boutton" name="accueil" value="accueil"></a></div>
 <td></tr></table>
 </form>
  </td></tr></table></td></tr></table>
 </BODY>
 </html>
 <?php 
 }
 ?>
 <script>
  function appel()
  { var y = document.getElementById("com");
  y.options.length=0;

       var xhttp, xmlDoc,option,id, x, i;
xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
  xmlDoc = this.responseXML;
  x = xmlDoc.getElementsByTagName("nom_commune_fr");
  id = xmlDoc.getElementsByTagName("id_commune");
  for (i = 0; i < x.length; i++) {
   option = document.createElement("option");
option.text = id[i].childNodes[0].nodeValue+" : "+x[i].childNodes[0].nodeValue ;
y.add(option); 
  }
  }
};
xhttp.open("GET","Ajax_commune.php?tbl2="+gouv.options[gouv.selectedIndex].value, true);
xhttp.send();
  } 

  
 function validation()
        {
		if (document.form.nom_person_arru.value == "")
        {
            alert("Veuillez saisir le champ nom personnel");
			document.form.nom_person_arru.focus();
            return false;
        }
       if (document.form.matricule.value == "")
        {
            alert("Veuillez saisir le matricue fiscale");
			document.form.matricule.focus();
            return false;
        }
				
}		
</script>