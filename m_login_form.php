<?php

/*************************************/
/* FONCTIONS DE CONNEXION PAR LOGIN  */
/* - verif_utilisateur() :           */
/*************************************/

 function verif_utilisateur(){
	global $db;
	if(isset ($_POST['id_user']) AND ($_POST['pass'])){
		
	echo 'test1';
	$id_user = htmlspecialchars($_POST['id_user']);
	$pass = htmlspecialchars($_POST['pass']);

	// Hachage du mot de passe
	$pass_hache=sha1($_POST['pass']);

	//verif des identifiant
	$req=$db->prepare('SELECT id_user, passcri FROM login WHERE id_user=:id_user AND passcri=:passcri');
	$req->execute(array(
	'id_user'=>$id_user,
	'passcri'=>$pass_hache));

	$resultat=$req->fetch();

	if(!$resultat){
		echo 'Mauvais identifiant ou mot de passe !';
	}
	else{
		$_SESSION['id_user'] = $resultat['id_user'];
		$_SESSION['pass'] = $resultat['passcri'];
		echo 'Vous étes connecté!';
	}
	header('Location: login.php');
	return $req;
	}
}
?>