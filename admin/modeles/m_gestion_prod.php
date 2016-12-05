<?php

/* Ajouter un produit par formulaire */
function ajout_prod()
{
	global $db;

	/* contrôles du fichier de l'image : erreur de transfert, taille de l'image, extension */

	if (isset($_FILES['image']))
	{
		if ($_FILES['image']['error'] > 0) $erreur = "Erreur lors du transfert";
		if ($_FILES['image']['size'] > $_POST["maxsize"]) $erreur = "Le fichier est trop gros";
		$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
		$extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
		/* if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte"; */
		$image_sizes = getimagesize($_FILES['image']['tmp_name']);

		/* transfert de l'image dans le dossier catalogue */
			$upload_image=$_FILES['image']['name'];

			$nom = "../img/catalogue/{$upload_image}";
			$resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nom);
			/* if ($resultat) echo "Transfert réussi"; */
	}
	
	/* Si la désignation du produit et son prix unitaire existe, insertion du produit dans la table produit */
	if (isset($_POST['designation']) AND $_POST['pu'])
	{
		/* décodage utf8 pour prendre en compte les accents */
		$designation = utf8_decode ( $_POST["designation"] );
	
		$statement=$db->prepare("INSERT INTO produit (designation, image, pu, remise, qte_stock) 
		VALUES(:designation, :image, :pu, :remise, :qte_stock)");
		$statement->execute(array(
					'designation' => $designation,
					'image' => $upload_image,
					'pu' => $_POST['pu'],
					'remise' => $_POST['remise'],
					'qte_stock' => $_POST['qte_stock']
					));
	
		echo '<div class="msg">Le produit a bien été ajouté !</div>';
		return $statement;
		$statement->closeCursor();
	}
}

/* modifier le produit dont on a le code produit */
function mod_prod()
{
	global $db;
	
	if (isset($_POST['designation']) AND $_GET['code_prod'])
	{
	/* Si une image est chargée, contrôler les paramètres et uploader. Sinon définir "$upload_image" comme l'ancien nom du fichier dans la table */
		if (isset($_FILES['image']))
		{
			if ($_FILES['image']['error'] > 0) $erreur = "Erreur lors du transfert";
			if ($_FILES['image']['size'] > $_POST["maxsize"]) $erreur = "Le fichier est trop gros";
			$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
			$extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
			if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte - ";
		

			/* transfert de l'image dans le dossier catalogue */
				$upload_image=$_FILES['image']['name'];

			$nom = "../img/catalogue/{$upload_image}";
			$resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nom);
			if ($resultat) echo "Transfert réussi - ";
		}
		
		/* si on n'a pas changé l'image, et donc rechargé une image, utiliser l'ancienne valeur contenue dans la table produit */
		if (!is_uploaded_file($_FILES['image']['tmp_name'])){
				echo "good old image";
				$upload_image=$_POST['oldimg'];}	
		
	
	/* décodage utf8 pour prendre en compte les accents */
	$designation = utf8_decode ( $_POST["designation"] );
	

/* Modification de la table produit avec les valeurs contenues dans le formulaire */	
	$statement2=$db->prepare("UPDATE produit SET designation = :designation, image= :image,pu = :pu, remise = :remise, qte_stock = :qte_stock WHERE code_prod = :code_prod");
	$statement2->execute(array(
				'code_prod' => $_GET['code_prod'],
				'designation' => $designation,
				'image' => $upload_image,
				'pu' => $_POST['pu'],
				'remise' => $_POST['remise'],
				'qte_stock' => $_POST['qte_stock']
				));
	
		echo 'Le produit a bien été modifié !';

	return $statement2;
	$statement2->closeCursor();	
	}
}

/* supprimer le produit dont on donne le code produit */
function sup_prod()
{
	global $db;
	if (isset($_GET['code_prod']))
	{
		$statement=$db->prepare("DELETE FROM produit WHERE code_prod = :code_prod");
		$statement->bindParam(':code_prod', $_GET['code_prod'], PDO::PARAM_INT);
		$statement->execute();
		
		echo "<p>Le produit a bien été enlevé. <a href='index.php' class='btn btn-primary btn-lg'>Retournez à l'accueil</a></p>";
		
	}
	else{echo '<p>Vous n\'avez pas le droit de supprimer ce produit ou il n\'a pas été reconnu par le système.</p>';}
	return $statement;
}

?>