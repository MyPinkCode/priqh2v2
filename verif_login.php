<?php
session_start();
if(isset($_POST['login'])){
include("connection.php");
	$con=connect();
	$email=$_POST['username'];
	$password=$_POST['password'];
	if($con){
		$req="SELECT * FROM employees  where prenom='$email' and cin='$password'";
		$res=$con->query($req);	
	if($res->rowCount() == 1){
        $row = $res->fetch();
		$_SESSION['id']=$row['cin'];
		$_SESSION['login_admin']=$row['prenom'];
		$_SESSION['show']=true;
		header("location:index.php");
	}
	else { 
		
		$_SESSION['error']=true;
		header("location:login.php");
	}
}
}

?>