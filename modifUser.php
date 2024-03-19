<?php 
session_start();
ob_clean();
if (isset($_SESSION['id_user'])) {	
// on affiche la page cache
}else{
	//on fait la redirection vers login.php

	header("Location:login.php");
} ?>

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
include('script/modifUser_func.php');
 ?>

<!--Fin menu de navigation-->
<form method='POST'enctype='multipart/form-data' action="">

	<label>Nom:</label>
	<input type="text" name="nom" value="<?php echo $result["nom"] ?>"> 

	<label>Telephone:</label>
	<input type="text" name="phone" value="<?php echo $result["telephone"] ?>">
	<label>Email:</label>
	<input type="text" name="mail" value="<?php echo $result["email"] ?>">
	<label>Mot de passe:</label>
	<input type="password" name="mdp">

	<label>Photo:</label>
	<input type="file" name="photo">	

	<label>Fonction</label>
	<select> 

		<?php $q=$pdo->prepare("SELECT * FROM type_user");
		$q->execute();
		while($result=$q->fetch()){?>

			<option value="<?php echo $result['id_typeUser']?>">
				<?php echo $result['role']?>
			 </option>
	<?php	} ?>

	 </select>
<label> Biographie</label>

<textarea></textarea>
	<input type="submit" name="submit" value="Modifier le compte">

	</form>
<center>
<div id="erreur"> 
<h2>Welcome <?php echo $_SESSION['nom'] ?></h2>
</div>
</center>

</div>
 	 <?php
include('parties/footer.php');
 ?>
	
</div>
</body>
</html>
