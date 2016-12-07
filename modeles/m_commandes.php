<?php

/* Récupérer les détails des commandes d'un client*/

function get_commandes(){
	global $db;
	$statement=$db->prepare("SELECT * FROM entete_commande WHERE id_user= :id_user");
		$statement->execute(array('id_user' => $_SESSION['id_user']));
		
		return $statement;
}

function get_com_details($comi){
	global $db;
	$statement1=$db->prepare("SELECT * FROM ligne_commande 
							JOIN produit
							ON ligne_commande.code_prod=produit.code_prod
							WHERE id_com= :id_com");
		$statement1->execute(array('id_com' => $comi));
		
		return $statement1;
}

?>