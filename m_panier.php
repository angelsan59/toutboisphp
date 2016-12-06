<?php

/******************************************************************************/
/* FONCTIONS DE GESTION DU PANIER                        	                  */
/* - afficher_panier() : Récupération des données pour afficher le panier     */
/* - calcul_panier() : calculs de sous total, TVA, remise et total du panier  */
/* - sup_prod_panier() : suppression d'un produit du panier                   */
/******************************************************************************/

/* Afficher le panier */

function afficher_panier(){
	global $db;global $db;
	
	$stat=$db->prepare("SELECT * FROM produit JOIN ligne_commande ON produit.code_prod=ligne_commande.code_prod WHERE id_com= :id_com");
		$stat->execute(array('id_com' => $_SESSION['com']));
				
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
				
				/* création de la commande dans entete_commande */
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
				
				/* Ajout du produit dans ligne_commande */
				$stat1=$db->prepare("INSERT INTO ligne_commande (qte, id_com, code_prod) 
				VALUES(:qte, :id_com, :code_prod)");
				$stat1->execute(array(
					'qte' => $_POST['qte'],
					'id_com' => $_SESSION['com'],
					'code_prod' => $_POST['code_prod']
					));
				
				/* Récupération de la quantité en stock par code_prod */
				$stat3=$db->prepare("SELECT qte_stock FROM produit WHERE code_prod= :code_prod");
				$stat3->execute(array('code_prod' => $_POST['code_prod']));
					$don = $stat3->fetch();
					
				/*Calcul de la nouvelle quantité de stock */
					$new_qte = $don['qte_stock']- $_POST['qte'];
	
				/* Modification de la table produit pour diminuer le stock de la quantité ajoutée */	
				$statement2=$db->prepare("UPDATE produit SET qte_stock = :qte_stock WHERE code_prod = :code_prod");
				$statement2->execute(array(
					'code_prod' => $_POST['code_prod'],
					'qte_stock' => $new_qte
					));

			
			echo 'Produit ajouté au panier';
			}
		
			else{
				/* Ajout du produit dans ligne_commande avec l'id_com de la session */
				$stat1=$db->prepare("INSERT INTO ligne_commande (qte, id_com, code_prod) 
				VALUES(:qte, :id_com, :code_prod)");
				$stat1->execute(array(
				'qte' => $_POST['qte'],
				'id_com' => $_SESSION['com'],
				'code_prod' => $_POST['code_prod']
				));
				
				/* Récupération de la quantité en stock par code_prod */
				$stat3=$db->prepare("SELECT qte_stock FROM produit WHERE code_prod= :code_prod");
				$stat3->execute(array('code_prod' => $_POST['code_prod']));
					$don = $stat3->fetch();
					
				/*Calcul de la nouvelle quantité de stock */
					$new_qte = $don['qte_stock']- $_POST['qte'];
	
				/* Modification de la table produit pour diminuer le stock de la quantité ajoutée */	
				$statement2=$db->prepare("UPDATE produit SET qte_stock = :qte_stock WHERE code_prod = :code_prod");
				$statement2->execute(array(
					'code_prod' => $_POST['code_prod'],
					'qte_stock' => $new_qte
					));
			}
		
	}
	
	else{echo "Vous n'avez encore rien commandé. Consultez le catalogue pour ajouter des produits au panier ";}
		
}

/* Calcul du total des sommes du panier */
function calcul_panier(){
	global $db;
	
	$stat2=$db->prepare("SELECT SUM(pu*qte) AS sstotal, remise FROM ligne_commande JOIN produit 
	ON produit.code_prod=ligne_commande.code_prod WHERE id_com= :id_com");
			$stat2->execute(array('id_com' => $_SESSION['com']));
			
			
			return $stat2;
}

/* Retirer un produit du panier */
function sup_prod_panier(){
	global $db;
	if (isset($_GET['code_prod']))
	{
		$statement=$db->prepare("DELETE FROM ligne_commande WHERE code_prod = :code_prod");
		$statement->bindParam(':code_prod', $_GET['code_prod'], PDO::PARAM_INT);
		$statement->execute();
		
		echo "<p>Le produit a bien été enlevé. <a href='index.php' class='btn btn-primary btn-lg'>Retournez à l'accueil</a></p>";
		header('Location: panier.php');
	}
	else{echo '<p>Vous n\'avez pas le droit de supprimer ce produit ou il n\'a pas été reconnu par le système.</p>';}
	return $statement;
	
}



?>