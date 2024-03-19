<?php 
if(isset($_GET['user'])	AND !empty($_GET['user']) 
	AND is_numeric($_GET['user'])) {

$user=intval($_GET['user']);

$query=$pdo->prepare("SELECT *FROM users WHERE id_user=?");
$query->execute(array($user));
$result=$query->fetch();

// Modification du nom de l'utilisateur

if(isset($_POST['nom']) AND !empty($_POST['nom']) AND $_POST[
	'nom']!=$result['nom']) {
	$nom=htmlentities($_POST['nom']);
	$modifNom=$pdo->prepare("UPDATE users SET nom=? WHERE id_user=?");
	header("Location:listUser.php");
}
// Modification du télephone de l'utilisateur



}

 ?>