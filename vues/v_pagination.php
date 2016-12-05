<div align="center">

<?php
	$max = 6;
	
	$pageactuelle = $_GET['pageActuelle'] ;
	//echo $pageactuelle ;
	
	$classpagemoins2 = "neutre" ;
	$classpagemoins1 = "neutre" ;
	$classpageplus2 = "neutre" ;
	$classpageplus1 = "neutre" ;
	
	// Calculs de bases au départ
	$minpagemoins2 = (($_GET['pageActuelle']-3)*$max) ;
	$minpagemoins1 = (($_GET['pageActuelle']-2)*$max) ;
	$minpageplus1 = (($_GET['pageActuelle'])*$max) ;
	$minpageplus2 = (($_GET['pageActuelle']+1)*$max) ;
	
	$nbpagemoins2 = $_GET['pageActuelle'] - 2 ;
	$nbpagemoins1 = $_GET['pageActuelle'] - 1 ;
	$nbpageplus1 = $_GET['pageActuelle'] + 1 ;
	$nbpageplus2 = $_GET['pageActuelle'] + 2 ;	
	
	$nompagemoins2 = $nbpagemoins2 ;
	$nompagemoins1 = $nbpagemoins1 ;
	$nompageplus1 = $nbpageplus1 ;
	$nompageplus2 = $nbpageplus2 ;
	
	
	
	//echo $_GET['nbpagemaxi'] ;
	// Calcul du min pour la derniere page
	$verspagemaxi = (($_GET['nbpagemaxi']-1)*$max) ;
	//	Si page actuelle est 2 alors pas de page "-2"
	if ($_GET['pageActuelle']==2)
		{
		$classpagemoins2 = "hidden" ;		
		//$nompagemoins2 = "-" ;
		//$nbpagemoins2 = 1 ;
		}
	//	Si page actuelle est 1 alors pas de page "-2" et "-1"	
	if ($_GET['pageActuelle']==1)
		{
		$classpagemoins2 = "hidden" ;
		$classpagemoins1 = "hidden" ;	
		//$minpagemoins2 = 0 ;
		//$nompagemoins2 = "-" ;
		//$nbpagemoins2 = 1 ;
		//$minpagemoins1 = 0 ;
		//$nompagemoins1 = "-" ;
		//$nbpagemoins1 = 1 ;
		}
	//	Si page actuelle est la page maxi alors pas de page "+2" et "+1"	
	if ($_GET['pageActuelle']==$_GET['nbpagemaxi']) 
		{
		$classpageplus2 = "hidden" ;
		$classpageplus1 = "hidden" ;	
		//$minpageplus2 = $verspagemaxi ;
		//$nompageplus2 = "-" ;
		//$nbpageplus2 =	$_GET['nbpagemaxi'] ;
		//$minpageplus1 = $verspagemaxi ;
		//$nompageplus1 = "-" ;
		//$nbpageplus1 =	$_GET['nbpagemaxi'] ;
		}
	//	Si page actuelle est l'avant deniere page alors pas de page "+2"
	if ($_GET['pageActuelle']==($_GET['nbpagemaxi']-1))
		{
		$classpageplus2 = "hidden" ;
		//$minpageplus2 = $verspagemaxi ;
		//$nompageplus2 = "-" ;
		//$nbpageplus2 =	$_GET['nbpagemaxi'] ;
		}
?>



<nav aria-label="Page navigation">
  <ul class="pagination">
    <li> <!-- Flèche retour début -->
		<a href="index.php?min=0&max=<?php echo $max ; ?>&pageActuelle=1"><span aria-hidden="true">&laquo;</span></a></li>
    </li>
    <li class="<?php echo $classpagemoins2 ; ?>"><a href="index.php?min=<?php echo $minpagemoins2 ; ?>&max=<?php echo $max ; ?>&pageActuelle=<?php echo $nbpagemoins2 ; ?>"><?php echo $nompagemoins2; ?></a></li>
    <li class="<?php echo $classpagemoins1 ; ?>"><a href="index.php?min=<?php echo $minpagemoins1 ; ?>&max=<?php echo $max ; ?>&pageActuelle=<?php echo $nbpagemoins1 ; ?>"><?php echo $nompagemoins1; ?></a></li>
    <li class="active"><a href="#"> <?php echo $pageactuelle; ?> <span class="sr-only"><?php echo $pageactuelle; ?></span></a></li>
    <li class="<?php echo $classpageplus1 ; ?>"><a href="index.php?min=<?php echo $minpageplus1 ; ?>&max=<?php echo $max ; ?>&pageActuelle=<?php echo $nbpageplus1 ; ?>"><?php echo $nompageplus1; ?></a></li>
    <li class="<?php echo $classpageplus2 ; ?>"><a href="index.php?min=<?php echo $minpageplus2 ; ?>&max=<?php echo $max ; ?>&pageActuelle=<?php echo $nbpageplus2 ; ?>"><?php echo $nompageplus2; ?></a></li>
    <li> <!-- Flèche direct fin -->
		<a href="index.php?min=<?php echo $verspagemaxi ; ?>&max=<?php echo $max ; ?>&pageActuelle=<?php echo $_GET['nbpagemaxi'] ; ?>"><span aria-hidden="true">&raquo;</span></a></li>
    </li>
  </ul>
</nav>

</div>