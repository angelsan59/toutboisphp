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

<!-- login -->

	
		<?php 
			require_once("connexion.php");
			$db = Connexion::getInstance();
			
			if (isset($_SESSION['id_user']) && isset($_SESSION['pass'])){
			echo 'vous êtes déjà connecté, voulez vous vous déconnecter?';
			echo ' <p><a class="btn btn-primary btn-lg" href="deconnection.php" role="button">Deconnection</a></p>';
			}else{
				
				include_once('modeles/m_login_form.php');
				
				$req = verif_utilisateur();
				if(!isset ($_POST['id_user']) || ($_POST['pass'])){
					include_once('vues/v_login_form.php');
					
				}
				
			}
			?>
	
   
<!-- début footer -->
<?php include_once('vues/v_footer.php'); ?>
<!-- fin footer -->