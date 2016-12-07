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

<!-- début liste commandes -->
<div class="container">
  <div class='row'>
    <div class='col-md-12'>
<div class="panel-group" id="accordion">
		<?php 
			require_once("connexion.php");
			$db = Connexion::getInstance();
			
			include_once('modeles/m_commandes.php');
			
			$statement = get_commandes();
			$donnees = $statement->fetchAll();
		
include_once('vues/v_commandes.php');
$statement->closeCursor();
		?>
		
</div>
</div>
</div>
</div>
<!-- fin liste commandes -->

   
<!-- début footer -->
<?php include_once('vues/v_footer.php'); ?>
<!-- fin footer -->