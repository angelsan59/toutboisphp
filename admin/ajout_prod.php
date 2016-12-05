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

<!-- Affichage du formulaire d'ajout et traitement du formulaire, ajout du produit -->
<?php 
require_once("../connexion.php");
$db = Connexion::getInstance();

include_once('modeles/m_gestion_prod.php');
$statement = ajout_prod();
include_once('vues/v_ajout_form.php');
?>
<!-- fin formulaire -->
   
<!-- début footer -->
<?php include_once('../vues/v_footer.php'); ?>
<!-- fin footer -->