
<?php
foreach ($donnees as $donnee)
{
	$donnee['titre'] = htmlspecialchars($donnee['titre']);
			$donnee['auteur'] = htmlspecialchars($donnee['auteur']);
?>
<div class="livre">
    <ul class="fa-ul">
        <li><i class="fa-li fa fa-book"style="color:#0d8e9a; margin-right:5px;"></i><a href="fiche_livre.php?id_livre=<?php echo $donnee['id']; ?>">
		<?php echo $donnee['titre']; ?></a> par  <?php echo $donnee['auteur']; ?>  
		
		<?php
		if ($_SESSION['id_user']==$donnee['id_user'])
		{ ?>
		<a href="mod_livres.php?id_livre=<?php echo $donnee['id']; ?>"><i class="fa fa-pencil" style="color:#ff9006; margin-left:5px;"></i></a> 
		<a href="sup_livre.php?id_livre=<?php echo $donnee['id']; ?>&id_user=<?php echo $donnee['id_user']; ?>" onclick="return confirm('Etes-vous sûr ?');">
		<i class="fa fa-times-circle" style="color:#ba0404;"></i></a></li>
		
		<?php }
		?>
    </ul>
    
    <p>
   
</div>
<?php
}
?>
