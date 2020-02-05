<?php
 session_start();
unset ($_SESSION['id']);
unset ($_SESSION['login_admin']);
 session_destroy();
 header("Location:Login.php");
exit;
?> 