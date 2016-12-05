
<?php
foreach ($donnees as $donnee)
{
$donne['designation'] = utf8_encode($donnee['designation']);
				$designation = htmlspecialchars($donne['designation']);
?>
  <div class="col-sm-6 col-md-4">
   <div class="thumbnail">
                            <img src="../img/catalogue/<?php echo $donnee['image']; ?>" style="height:200px;" alt="">
                            <div class="caption">
                                <h4 class="pull-right"><?php echo $donnee['pu']; ?> €</h4>
			
                                <h4><a href="../fiche_prod.php?code_prod=<?php echo $donnee['code_prod']; ?>"><?php echo $designation; ?></a>
                                </h4>
								<?php
									if (isset($donnee['remise']) AND $donnee['remise']>0)
										{echo "avec une remise de " . $donnee['remise'] . " %<br><br>";}
									else
									{echo "pas de remise<br><br>";}
								?>	
                                <p style="text-align:center;"><a href="mod_prod.php?code_prod=<?php echo $donnee['code_prod']; ?>" class="btn btn-primary" role="button">Modifier le produit</a> 
								<a href="sup_prod.php?code_prod=<?php echo $donnee['code_prod']; ?>" class="btn btn-default" role="button" onclick="return confirm('Etes-vous sûr ?');">Supprimer</a></p>
                            </div>
                            
                        </div>
  </div>
<?php
}
?>
