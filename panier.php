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

		<?php 
			require_once("connexion.php");
			$db = Connexion::getInstance();
			
			include_once('modeles/m_panier.php');
			ajout_prod();
			
			$stat = afficher_panier();
			$donnees = $stat->fetchAll();
include_once('vues/v_panier.php');
		?>
		

<!-- fin catalogue -->

   
<!-- début footer -->
<?php include_once('vues/v_footer.php'); ?>
<!-- fin footer -->