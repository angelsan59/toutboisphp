<?php
	try{
		//connection à la base de données, avec verification des erreurs
		$bdd = new PDO('mysql:host=localhost;dbname=toutbois;charset=utf8', 'root', '');
		echo 'base connectee';
	}catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
				
	$reponse=$bdd->query('SELECT SUBSTR(nomens, 1, 2) AS nomcoupe, SUBSTR(ville, 1, 2) AS villecoupe, idcli FROM clients');
					
	while($donnees = $reponse->fetch()){
		$rep=htmlspecialchars($donnees ['nomcoupe'].$donnees['villecoupe'].rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9));
								
		$pass_hache=sha1($rep);
						
		$req = $bdd->prepare('INSERT INTO login (id_user, password, passcri) VALUES (:id_user, :rep, :pass_hache)');
		$req->execute(array(
		'rep' => $rep,
		'id_user'=>$donnees['idcli'],
		'pass_hache'=>$pass_hache
		));
		}
			echo 'done';				
		$reponse->closeCursor();
							
?>