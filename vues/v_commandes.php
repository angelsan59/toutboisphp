<?php
foreach ($donnees as $donnee)
{
$comi = $donnee['id_com'];
?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#com<?php echo $donnee['id_com']; ?>">
          Date : <?php echo $donnee['date_com']; ?> Commande n° <?php echo $donnee['id_com']; ?>
        </a>
      </h4>
    </div>
    <div id="com<?php echo $donnee['id_com']; ?>" class="panel-collapse collapse">
      <div class="panel-body">
	
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
	 
	 $statement1=get_com_details($comi);
	 $donn = $statement1->fetchAll();
	 foreach ($donn as $don)
{
				$do['designation'] = utf8_encode($don['designation']);
				$designation = htmlspecialchars($do['designation']);
				$total_prod=($don['pu']*$don['qte'])-($don['pu']*$don['qte']*$don['remise']/100);
				
?>


 <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail1 pull-left" href="#"> <img class="media-object" src="img/catalogue/<?php echo $don['image']; ?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="fiche_prod.php?code_prod=<?php echo $don['code_prod']; ?>">
								<?php echo $designation; ?></a></h4>
								<p><?php 
								
								if (!$don['remise']==0) {echo $don['remise']. '% de remise';} ?> </p>
                                
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <?php echo $don['qte']; ?>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $don['pu']; ?> €</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $total_prod; ?> €</strong></td>
                        <td class="col-sm-1 col-md-1">
                       </td>
                    </tr>
	<?php } ?>					
                  
                  
                  
                </tbody>
            </table>
        </div>
	</div>
</div>

      </div>
    </div>
  </div>

<?php
}
?>