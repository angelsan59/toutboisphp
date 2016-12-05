<?php
session_start(); // On démarre la session AVANT toute chose
?>
<?php include_once('vues/v_top_html.php'); ?>
  
    <!-- Menu de haut de page -->
<?php include_once('vues/v_navbar.php'); ?>
<!-- fin menu -->

<!-- Entête et texte -->
   <?php include_once('vues/v_header_index.php'); ?>
<!-- fin entête -->

<!-- début catalogue -->
<div class="container">
	<div class="row">
		<?php 
			require_once("connexion.php");
			$db = Connexion::getInstance();

			include_once('modeles/m_liste_prod.php');
			$statement = get_prod($_GET['code_prod']);

			$donnees = $statement->fetchAll();

			
include_once('vues/v_liste_prod.php');
			
			$statement->closeCursor();
		?>
	</div>
</div>

<!-- fin catalogue -->

<!-- pagination -->
<?php include_once('vues/v_pagination.php'); ?>
<!-- fin pagination -->
   
<!-- début footer -->
<?php include_once('vues/v_footer.php'); ?>
<!-- fin footer -->