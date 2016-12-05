<?php

/* Afficher le panier */

function afficher_panier(){
	global $db;global $db;
	
	$stat=$db->prepare("SELECT * FROM produit JOIN ligne_commande ON produit.code_prod=ligne_commande.code_prod WHERE id_com= :id_com");
		$stat->execute(array('id_com' => $_SESSION['id_com']));
				
return $stat;

			
	
	
}

/* Ajouter un article au panier */

function ajout_prod(){
	global $db;
	
	/* vérifier que les variables code_prod et qte existent bien */
	if (isset ($_POST['code_prod']) AND isset ($_POST['qte']))
	{
			/* vérifier que c'est le premier produit commandé, et que donc il n'y a pas de session com */
			if(!isset ($_SESSION['com'])){
				$statement=$db->prepare("INSERT INTO entete_commande (date_com, id_user, valid) 
				VALUES(NOW(), :id_user, 'en cours')");
				$statement->execute(array('id_user' => $_SESSION['id_user']));

				echo '<div class="msg">La commande a bien été créée !</div>';
				
				/* récupérer id_com et stocker dans une session */
				$stat=$db->prepare("SELECT id_com, date_com FROM entete_commande WHERE id_user = :id_user 
				ORDER BY id_com DESC LIMIT 0,1");
				$stat->execute(array('id_user' => $_SESSION['id_user']));
				$donnees = $stat->fetch();
				$_SESSION['com'] = $donnees['id_com'];
				$_SESSION['date_com'] = $donnees['date_com'];
				
				echo 'session '.$_SESSION['com'];
				
				$stat1=$db->prepare("INSERT INTO ligne_commande (qte, id_com, code_prod) 
				VALUES(:qte, :id_com, :code_prod)");
				$stat1->execute(array(
				'qte' => $_POST['qte'],
				'id_com' => $_SESSION['com'],
				'code_prod' => $_POST['code_prod']
				));
			
			
			}
		
		
	}
	
	else{echo 'manque code prod et qte';}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}

/* Vérification de stock : comparaison de "qte" entrée dans le panier et "qte_stock" dans la table produit 
: non utilisée à cause du menu déroulant */
function verif_stock(){
	global $db;
	
	/* vérification uniquement si on a les variables code_prod et qte */
	
			$statement=$db->prepare("SELECT code_prod,qte_stock FROM produit WHERE code_prod = :code_prod");
			$statement->execute(array('code_prod' => $_GET['code_prod']));
			
			$donnees = $statement->fetch();
			
			if ($_GET['qte']>=$donnees['qte_stock'])
				{echo 'commande possible';}
			else{echo 'commande impossible';}
		
			return $statement;
			
}





















?>