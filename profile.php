<?php 
session_start();
ob_clean();
if (isset($_SESSION['id_user'])) {
	
// on affiche la page cache
}else{

	//on fait la redirection vers login.php

	header("Location:login.php");
}

 ?>

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

$user=intval($_GET['user']);

$q=$pdo->prepare("SELECT * FROM users,type_user 
	WHERE users.cat_user=type_user.id_typeUser 
	AND id_user=?");
$q->execute(array($user));
$result=$q->fetch();
 ?>

<!--Fin menu de navigation-->

<center id="erreur"> 
<h2>Welcome <?php echo $_SESSION['nom'] ?></h2>
</div>
</center>

<div id="cadreApropos">
	<img src="photos/<?php echo $_SESSION['name_photo'] ?>">
	<div id="moi">
		<table style="border-bottom:#000" border="1" width="100%">
			<caption> Information sur mon Profil</caption>
			<thead>
				<tr>
					<td> <h3> Nom Complet</h3></td>
					<td> <?php echo $result['nom'] ?> </td>
				</tr>
				<tr>
					<td> <h3>Téléphone</h3></td>
					<td><?php echo $result['telephone'] ?></td>
				</tr>
				<tr>
					<td> <h3> Email</h3></td>
					<td><?php echo $result['email'] ?></td>
				</tr>
				<tr>
					<td> <h3>Fonction</h3></td>
					<td><?php echo $result['role'] ?></td>
				</tr>
				<tr>
					<td> <h3>Biographie</h3></td>
					<td><?php echo $result['biographie'] ?></td>
				</tr>
			</thead>
		</table>
		<div style="height: 25px;"> </div>
		<a class="editPro" href=" Edition de Profil " > </a>
	</div>
</div>



 	 <?php
include('parties/footer.php');
 ?>
	
</div>
</body>
</html>








