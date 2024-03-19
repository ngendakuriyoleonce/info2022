<?php 
session_start();
ob_clean();

 ?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<div id="container">

<?php
include('script/db.php');
include('parties/menu.php');
include("script/login_func.php");
 ?>

<center id="erreur"> 
<?php 

if(isset($error)){
	echo $error;
} 
?>
</center>

<form method="POST"enctype='multipart/form-data' action="">


	<label>Email:</label>
	<input type="text" name="mail"placeholder="entrez votre adresse email"><br>

	<label>Mot de passe:</label>
	<input type="password" name="mdp"placeholder="entrez votre password"><br>
	

	<input type="submit" name="submit" value="Se connecter">


	</form>


 	 <?php
include('parties/footer.php');
 ?>
	
</div>
</body>
</html>








