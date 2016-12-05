<!-- To do : vérification de champs -->

<?php
foreach ($donnees as $donnee)
{
$donne['designation'] = utf8_encode($donnee['designation']);
				$designation = htmlspecialchars($donne['designation']);
				}
?>

<div class="container">
<div class="row">
  
	<div class="col-md-8 text-center">
<form action="mod_prod.php?code_prod=<?php echo $_GET['code_prod']; ?>" method="post" enctype="multipart/form-data">
	
	
			<label for="designation">Désignation</label><br/>
			<input type="text" name="designation" id="designation" value="<?php echo $designation; ?>" /><br /><br/>
			<label for="pu">Prix unitaire (en €)</label><br/>
			<input type="text" name="pu" id="pu" value="<?php echo $donnee['pu']; ?>" /><br /><br/>
			<label for="remise">Quelle est la remise? (en %)</label><br/>
			<input type="text" name="remise" id="remise" value="<?php echo $donnee['remise']; ?>" /><br /><br/>
			<label for="qte_stock">Quantité en stock</label><br/>
			<input type="text" name="qte_stock" id="qte_stock" value="<?php echo $donnee['qte_stock']; ?>" /><br /><br/>
<br />
	Si vous voulez changer l'image, choisissez-en une. Sinon, laissez vide.
	<input type="hidden" name="maxsize" value="1048576" />
	<input type="hidden" name="oldimg" id="oldimg" value="<?php echo $donnee['image']; ?>" />
	<label for="image">Image du produit (max. 1 Mo)</label><br/>
			<input type="file" name="image" id="image" /><br /><br/>
		</div>
		<div class="col-md-4">
		<img src="../img/catalogue/<?php echo $donnee['image']; ?>" alt="" style="height:200px;" /></div>
		</div></div>
	<div align="center"><button type="submit" class="btn btn-primary btn-lg">Modifier le produit</button>
	
	</div>
	
</form>
<br /><br />

<?php

?>
