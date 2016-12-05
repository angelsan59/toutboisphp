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



<?php 
require_once("../connexion.php");
$db = Connexion::getInstance();

if (isset($_GET['code_prod']))
	{
		include_once('../modeles/m_liste_prod.php');
		$statement = get_prod($_GET['code_prod']);
		$donnees = $statement->fetchAll();
		
		include_once('modeles/m_gestion_prod.php');
		$statement = mod_prod();
		include_once('vues/v_mod_form.php');
	}
?>


  <!-- début footer -->
<?php include_once('../vues/v_footer.php'); ?>
<!-- fin footer -->