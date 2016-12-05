<?php

/* Afficher un produit */
function get_prod($code_prod)
{
	global $db;
	$statement=$db->prepare("SELECT code_prod,designation, image,pu,remise,qte_stock FROM produit WHERE code_prod= :code_prod");
	$statement->bindParam(':code_prod', $code_prod, PDO::PARAM_INT);
	$statement->execute();
	return $statement;
}



/* Liste des produits par ordre décroissant de code produit */
function get_liste_prod()
{
	global $db;
	$statement=$db->prepare("SELECT code_prod,designation, image,pu,remise,qte_stock FROM produit WHERE qte_stock>0 ORDER BY code_prod DESC");
	$statement->execute();
	return $statement;
}

/* Liste des produits, sélection du nombre des produits affichés et du point de départ. les nombres sont paramétrables */
function get_pag_prod($depart,$nombre)
{
	global $db;
	$depart1= (int)$depart;
	$nombre1= (int)$nombre;
	$statement=$db->prepare("SELECT code_prod,designation,image,pu,remise,qte_stock FROM produit WHERE qte_stock>0 ORDER BY code_prod DESC LIMIT $depart1,$nombre1");
	$statement->execute(array(
					'depart' => $depart1,
					'nombre' => $nombre1
					));
	return $statement;
}

/* Affichage des produits dans une table 3 par 2  */
function afficharticle ($depart,$nombre) //
{
	global $db;
	$depart1= (int)$depart;
	$nombre1= (int)$nombre;
	$_GET['nbpagemaxi'] = pagination ($nombre1) ;
	if(isset($_GET['pageActuelle'])) // Si la variable $_GET['page'] existe...
	{
		$pageActuelle=intval($_GET['pageActuelle']);
		if($_GET['pageActuelle']>$_GET['nbpagemaxi']) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nb_pages...
			{
			$_GET['pageActuelle']=$nb_pages;
			}
	}
	else // Sinon
	{
		$_GET['pageActuelle']=1; // La page actuelle est la n°1    
	}
 	// $depart=($pageActuelle-1)*$nombre1;	// On calcul la première entrée à lire
	$statement=$db->prepare("SELECT code_prod,designation,image,pu,remise,qte_stock FROM produit WHERE qte_stock>0 ORDER BY code_prod DESC LIMIT $depart1,$nombre1");
	$statement->execute(array(
					'depart' => $depart1,
					'nombre' => $nombre1
					));
	return $statement;
}

/* pagination pour la navigation de fin de page */
function pagination ($limit){ //Récupére le nombre de pages totales.
	global $db;
	
	/* Déterminer le nombre de produits */
	$statement1=$db->prepare("SELECT COUNT(*) AS nb_prod FROM produit");
	$statement1->execute();
	
	$donnees = $statement1->fetch();
	//echo $donnees['nb_prod'];
	//Nous allons maintenant compter le nombre de pages.
	$nb_pages=ceil($donnees['nb_prod']/$limit);	
	// $nb_pages=$donnees['nb_prod']/$limit;
	//echo $nb_pages;
	return $nb_pages;
	//return $statement1;
}

?>