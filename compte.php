<!DOCTYPE html>
<!DOCTYPE html>
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
include("script/compte_function.php");
 ?>

<center id="erreur"> 
<?php 

if(isset($error)){
	echo $error;
} 
?>
</center>

<marquee behavior="" direction="left";style="color=red;background-color=yellow"> <h3> Veuillez remplir votre Formulaire</h3> </marquee>

<form method='POST'enctype='multipart/form-data' action="">

	
	<label>Nom:</label>
	<input type="text" name="nom"placeholder="entrez votre nom"> <br>

	<label>Telephone:</label>
	<input type="text" name="phone"placeholder="entrez votre telephone"><br>

	<label>Email:</label>
	<input type="text" name="mail"placeholder="entrez votre mail"><br>

	<label>Mot de passe:</label>
	<input type="password" name="mdp"placeholder="entrez votre mot de passe"><br>

	<label>Photo:</label>
	<input type="file" name="photo"placeholder="photos">	

	<input type="submit" name="submit" value="Je m'inscris">


	</form>


 	 <?php
include('parties/footer.php');
 ?>
	
</div>
</body>
</html>








