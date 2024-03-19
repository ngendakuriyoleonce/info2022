<?php 
include('script/db.php');

if(isset($_GET['user'])){
	$user=$_GET['user'];
	$delete=$pdo->prepare("DELETE FROM users WHERE id_user=?");
	$delete->execute(array($user));
	header("Location:listUser.php");
}

 ?>