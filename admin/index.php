<?php
session_start(); // On démarre la session AVANT toute chose
?>
<?php include_once('vues/v_top_html_admin.php'); ?>
  
    <!-- Menu de haut de page -->
 <?php include_once('vues/v_navbar_admin.php'); ?>
<!-- fin menu -->

<!-- Entête et texte -->
   <?php include_once('vues/v_header_admin.php'); ?>
<!-- fin entête -->

<!-- début catalogue -->
<div class="container">
	<div class="row .row-eq-height">
		<?php 
			require_once("../connexion.php");
			$db = Connexion::getInstance();

			include_once('../modeles/m_liste_prod.php');
			$nbpages = pagination ('6') ;
			if (isset ($_GET['min']) AND isset ($_GET['max']) )
				{
				// echo $_GET['min'],$_GET['max'],$_GET['pageActuelle'], " Avant l'appel"  ; // A virer pour contrôle
				$statement = afficharticle ($_GET['min'],$_GET['max']);
				// echo $_GET['min'],$_GET['max'],$_GET['pageActuelle'], " apres l'appel"  ; // A virer pour contrôle
				}
				else
				{
			    // Echo "premiere init" ;
				$_GET['min'] = 0 ;
				$_GET['max'] = 6 ;
				$_GET['pageActuelle'] = 1;
				$_GET['nbpagemaxi'] = 1 ;
				$statement = afficharticle ($_GET['min'],$_GET['max']);
				// echo $_GET['min'],$_GET['max'],$_GET['pageActuelle'],$_GET['nbpagemaxi'], " apres init"  ; // A virer pour contrôle
				}
			$donnees = $statement->fetchAll();

			
include_once('vues/v_admin_liste_prod.php');
			
			$statement->closeCursor();
		?>
	</div>
</div>

<!-- fin catalogue -->


<!-- pagination -->
<?php include_once('../vues/v_pagination.php'); ?>
<!-- fin pagination -->
   
<!-- début footer -->
<?php include_once('../vues/v_footer.php'); ?>
<!-- fin footer -->