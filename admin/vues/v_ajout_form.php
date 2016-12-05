<!-- To do : vérification de champs -->
<div align="center">
<section id="liste">
<form action="ajout_prod.php" method="post" enctype="multipart/form-data">
	<div align="center"><fieldset>
			<label for="designation">Désignation</label><br/>
			<input type="text" name="designation" id="designation" /><br /><br/>
			<label for="pu">Prix unitaire (en €)</label><br/>
			<input type="text" name="pu" id="pu" /><br /><br/>
			<label for="remise">Quelle est la remise? (en %)</label><br/>
			<input type="text" name="remise" id="remise" /><br /><br/>
			<label for="qte_stock">Quantité en stock</label><br/>
			<input type="text" name="qte_stock" id="qte_stock" /><br /><br/>
	</fieldset><br />
	<fieldset>
	<input type="hidden" name="maxsize" value="1048576" />
	<label for="image">Image du produit (max. 1 Mo)</label><br/>
			<input type="file" name="image" id="image" /><br /><br/>
	</fieldset><br />
	
	
	<button type="submit" class="btn btn-primary btn-lg">Ajouter le produit</button></div>
	
</form>
<br /><br />
</section>
</div>