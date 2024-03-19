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



$q=$pdo->prepare("SELECT  * FROM users,type_user 
	WHERE users.cat_user=type_user.id_typeUser");
$q->execute();

 ?>

<!--Fin menu de navigation-->

<center>
<div id="erreur"> 
<h2>Welcome <?php echo $_SESSION['nom'] ?></h2>
</div>
</center>
<table width="100%" border="1">
	<th>Photo</th>
	<th>nom</th>
	<th>Email</th>
	<th>Téléphone</th>
	<th>Fonction</th>
	<th> Paramètres</th>
<tbody>
	<?php while ($result=$q->fetch()) { ?>

		<tr>
		<td><img id ="paci" src="photos/<?php echo $result["name_photo"]?>"></td>

		<td><?php echo $result["nom"]?> </td>
		<td><?php echo $result["email"]?> </td>
		<td><?php echo $result["telephone"]?> </td>
		<td><?php echo $result["role"]?> </td>
		
		<td> 
			<a href="modifUser.php?user=<?php echo $result["id_user"]?>"> Modifier </a> &nbsp;&nbsp; 
		    <a href="">Suprimer</a> 
		</td>
	</tr>
	<?php	} ?>
	
	
</tbody>
</table>
</div>
 	 <?php
include('parties/footer.php');
 ?>
	
</div>
</body>
</html>
