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

<?php 
require_once("connexion.php");
$db = Connexion::getInstance();

if (isset($_GET['code_prod']))
	{
		
		include_once('modeles/m_panier.php');
		$statement = sup_prod_panier();
		
	}
?>


  <!-- début footer -->
<?php include_once('vues/v_footer.php'); ?>
<!-- fin footer -->