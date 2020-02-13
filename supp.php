<?php
            session_start();
            include("connection.php");
            $con=connect();
            if (!isset($_SESSION['id'])) { header("location:login.php"); } 
            $r= $_GET['data']; 
            $req = "DELETE FROM projet
            WHERE id_projet=" .$r;
            $res = $con->exec($req);
            if ($res) {
              header("Location:http://localhost/priqh2/map.php?data=0&com=0");
            }
        ?>