<?php
foreach ($donnees as $donnee)
{
$donne['designation'] = utf8_encode($donnee['designation']);
				$designation = htmlspecialchars($donne['designation']);
?>
  <div class="col-sm-6 col-md-4">
   <div class="thumbnail">
                            <img src="img/catalogue/<?php echo $donnee['image']; ?>" style="height:200px;" alt="">
                            <div class="caption">
                                <h4 class="pull-right"><?php echo $donnee['pu']; ?> €</h4>
			
                                <h4><a href="fiche_prod.php?code_prod=<?php echo $donnee['code_prod']; ?>"><?php echo $designation; ?></a>
                                </h4>
								<?php
									if (isset($donnee['remise']) AND $donnee['remise']>0)
										{echo "avec une remise de " . $donnee['remise'] . " %<br><br>";}
									else
									{echo "pas de remise<br><br>";}
								?>	
                                <div align="center">
								<form action="panier.php" method="post">
								<input type="hidden" name="code_prod" value="<?php echo $donnee['code_prod']; ?>">
								 <select name="qte">
								 
									<?php
										for ($i=1; $i<=$donnee['qte_stock']; $i++)
										{ ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>
								</select>
								<button type="submit" class="btn btn-primary btn-lg">Ajouter au panier <i class="fa fa-lg fa-cart-plus"></i></button>
								<a href="fiche_prod.php?code_prod=<?php echo $donnee['code_prod']; ?>" class="btn btn-default" role="button">Infos</a>
								</form>

								</div>
                            </div>
                            
                        </div>
  </div>
<?php
}
?>