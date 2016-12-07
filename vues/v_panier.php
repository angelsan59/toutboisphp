<div class="container">
	<div class="row">
	 <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th class="text-center">Prix unitaire</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
				<?php
foreach ($donnees as $donnee)
	{
		$donne['designation'] = utf8_encode($donnee['designation']);
		$designation = htmlspecialchars($donne['designation']);
		$total_prod=($donnee['pu']*$donnee['qte'])-($donnee['pu']*$donnee['qte']*$donnee['remise']/100);
				
?>

       
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail1 pull-left" href="#"> <img class="media-object" src="img/catalogue/<?php echo $donnee['image']; ?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="fiche_prod.php?code_prod=<?php echo $donnee['code_prod']; ?>">
								<?php echo $designation; ?></a></h4>
								<p><?php 
								
								if (!$donnee['remise']==0) {echo $donnee['remise']. '% de remise';} ?> </p>
                                
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="text" class="form-control" id="qte" value="<?php echo $donnee['qte']; ?>">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $donnee['pu']; ?> €</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $total_prod; ?> €</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a class="btn btn-danger" href="sup_prod_panier.php?code_prod=<?php echo $donnee['code_prod']; ?>" 
						role="button" onclick="return confirm('Etes-vous sûr ?');">
                            <span class="fa fa-minus-square"></span> Retirer
                        </a></td>
                    </tr>
	<?php } ?>					
                  
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Soustotal</h5></td>
                        <td class="text-right"><h5><strong><?php echo $don['sstotal']; ?> €</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>TVA (20%)</h5></td>
                        <td class="text-right"><h5><strong><?php echo $tva; ?> €</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong><?php echo $total; ?> €</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <a class="btn btn-default" href="index.php" role="button">
                            <span class="fa fa-lg fa-cart-plus"></span> Continuer les courses
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Finaliser la commande <span class="fa fa-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
	</div>
</div>