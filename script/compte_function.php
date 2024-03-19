<?php

if(isset($_POST["submit"])){
	if (!empty($_POST["nom"]) AND
		!empty($_POST["phone"]) AND
		!empty($_POST["mail"]) AND
		!empty($_POST["mdp"]) AND
		!empty($_FILES["photo"])) {

$nom=htmlentities($_POST['nom']);
$tel=htmlentities($_POST['phone']);
$mail=htmlentities($_POST['mail']);
$pass=sha1($_POST['mdp']);
$pass2=$_POST['mdp'];

$regex="/^[a-zA-Z\s]+$/";
$regPhone="/^[0-9\d]+$/";

$photo_name=$_FILES['photo']['name'];
$photo_ext=strchr($photo_name,".");
$doss_temp=$_FILES['photo']['tmp_name'];
$doss_dest='photos/'.$photo_name;
$extension_auto=array(".jpg",".JPG",".jpeg",".JPEG",".gif",".PNG",".png");


if(preg_match($regPhone, $tel)){
if(filter_var($mail,FILTER_VALIDATE_EMAIL)){
if(preg_match($regex,$nom)){

//
if(in_array($photo_ext,$extension_auto)){

	if(move_uploaded_file($doss_temp,$doss_dest)){

		$verif=$pdo->prepare("SELECT * FROM users WHERE email=? OR telephone=?");
		$verif->execute(array($mail,$tel));
		$result=$verif->rowCount();
		if ($result==0) {
			# code...
		
		//insert db

		$querry=$pdo->prepare("INSERT INTO users(nom,telephone,email,mdp,name_photo,photo_url) VALUES(?,?,?,?,?,?)");
		$querry->execute(array($nom,$tel,$mail,$pass,$photo_name,$doss_dest));
		if($querry){
			$error="Felicitation,votre compte est cree ,connectez-vous avec (".$mail.") et password(".$pass2.")";
		}

	}else{//verification de l'unicite de l'email
	$error="email ou numero de telephone deja utulise...";

}
}
	
	else{
 
		$error="erreur de chargement de votre fichier";

	}

}
else{
	$error="veuillez verifier le format de photo,extenstion";
}

}
else {


	$error="votre nom (".$nom.") n'est pas valide....";
}

}
else
{
	$error="votre mail (".$mail.") n'est pas valide....";
}
}
else {
$error="votre  numero de telephone (".$tel.") n'est pas valide....";
}



	}
	else
	{


		$error="!!!!!!!Tous les champs sont obligatoires";
}

}


?>