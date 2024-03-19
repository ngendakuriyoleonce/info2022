
<?php 
session_start();
ob_clean();

 ?><!DOCTYPE html>
<html>
<head>
	<title>Travail pratique de Programmation Web</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
</head>
<body>

<nav>
 	 <div id="logo">
 	 	<img src="images/logo.gif">
 	  	 	<h3>Hight Techonlogy</h3>
 	 </div>
 	 <div id="liens">
 	 	<ul>
 	 		
 	 		 	 		
      <?php 

          if(isset($_SESSION['id_user'])){?>
          	<li><a href="profile.php?user=<?php echo $_SESSION['id_user'] ?>"> Profile</a></li>

          	<li> <a href="listUser.php">Users</a></li>
          	
 	 		<li><a href="logout.php">Logout</a></li>
       <?php }else{ ?>

       		<li><a href="index.php">Accueil</a></li>
 	 		<li><a href="">A propos</a></li>
 	 		<li><a href="">Actualite</a></li>
 	 		<li><a href="compte.php">Compte</a></li>
 	 		<li><a href="login.php">Login</a></li>
       <?php } ?>
 	 	</ul>
 	 </div>
 </nav><!-- fin navigation-->
</body>
</html>