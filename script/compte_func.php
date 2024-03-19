<?php

if(isset($_POST["submit"])){
	if (!empty($_POST['nom']) AND
		 !empty($_POST['telephone']) AND
		 !empty($_POST['email']) AND
		 !empty($_POST['mdp']) AND
		 !empt($_FILES['photo'])){

       $nom=htmlentities($_FILES['nom']);
   $telephone=htmlentities($_POST['phone']);
      $email=htmlentities($_POST['mail']);
         $passeword=sha1($_POST['mdp']);

         $regex="/^[a-zA-Z\s]+$/";
         $Regphone="/^[0-9\d]+$/";

         $photo_name=$_FILES['photo']['name'];
         $photo_ext=strchr($photo_name,".");
         $doss_temp=$_FILES['photo']['tmp_name'];
         $doss_dest='photos/'.$photo_name;
         $extension_auto=array(".jpg",".GPG",".jpeg",".JPEG",".gif","PNG",".PNG","png");

         if(preg_match($Regphone,$tel)){
         if(filter_var($mail,FILTER-VALIDATE-EMAIL)){  
         if(preg_match($regex,$nom)){

       	if (in_array($photo_ext, $extension_auto)) {
         		
         		if (move_uploaded_file($doss_temp, $doss_dest)) {
         		
                 	
			// insertion dans BDD
         		
         		$query=$pdo->prepare(" INSERT INTO users(nom,telephone,email,mdp,name_photo,photo_url) VALUES(?,?,?,?,?,?)");
         		$query=->execute(array($nom,$tel,$mail,$pass,$photo_name,$doss_dest));

         		if($query){ 
         			$error="Félicitations, Votre compte est créé, Connectez-vous avec( ".$mail. " ) et Password ( ".$pass2" )";
         		}

         				}else{
         					$error="Erreur de chargement de votre photo...";
				}
         				}else{// Vérification de l'image
         					$error="Veuillez verifier le format de votre photo, Ex: toto.png";	}
         			}
         			else{//verification du format du nom
         				$error="votre( ."$nom.")n'est pas valide ...";
                     }
                      }
         		 else{
 //verification du format de l'E_mail
         			$error="email( ".$mail") n'est pas valide ...";
         		}else{
         			$error="le numero(".$tel.") n'est pas valide..";
}

}else{ // Vérification de l'image

 $error="Tous les champs sont obligatoires";
}
}

?>
