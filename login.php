<!DOCTYPE html>
<html>
    <head>
    <link rel="icon" href="source/icon.png">
    <title>login</title>
        <link rel="stylesheet" type="text/css" href="css/log.css">
        <?php 
  session_start();
?>
    </head>
<body>

    <div class="box">
      <img src="source/icon.png"/>
      <form action="verif_login.php" method="post">
      <h1>Gestion des projets -ARRU-</h1>
      <input name="username" type="text" id="username" value="" required placeholder="Username"/>
      <input name="password"type="password"id="password"value="" required placeholder="Password"/>
      <button name="login" type="submit">Login</button><?php
      if(isset($_SESSION['error'])){
          echo"<p style='color:white;text-align:center;font-size:20px;'>email or password incorrect</p>";
          $_SESSION['error']=null;}
          ?>
</form>
    </div>
  
</body>
</html>