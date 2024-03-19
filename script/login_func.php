
<?php

if(isset($_POST["submit"])){
	if(!empty($_POST["mail"])AND
	   !empty($_POST["mdp"])){
     $mail=htmlentities($_POST['mail']);
     $pass=sha1($_POST['mdp']);
if(filter_var($mail,FILTER_VALIDATE_EMAIL)){


$q=$pdo->prepare("SELECT * FROM users,type_user where users.cat_user=type_user.id_typeUser AND email=? AND mdp=?");
$q->execute(array($mail,$pass));
$trouv=$q->rowcount();
if($trouv>0){
	$info=$q->fetch();
	$_SESSION['id_user']=$info['id_user'];
	$_SESSION['nom']=$info['nom'];
	$_SESSION['email']=$info['email'];
	$_SESSION['role']=$info['role'];
	$_SESSION['name_photo']=$info['name_photo'];
	header("Location:profile.php?user=".$_SESSION['id_user']);

}else{$error="Mauvais identifiants";
}
}else{$error="Vérifiez  votre email";
}

}else{$error="Tous les champs sont obligatoires";

}
}
?>
