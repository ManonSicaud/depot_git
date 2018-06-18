<!DOCTYPE html>
<article>
	<header>
  <?php for($i=0, $c=count($Articles)-1;$i<=$c;$i++){ ?> 
  <?php $URL = "index.php?action=Article&id=".$Articles[$i]['Id']."" ?>
  <a href=<?php echo $URL; ?> >
    <h1 class="titreArticle">Titre article : <?php echo $Articles[$i]['Titre'] ?></h1>
		</a>
		<time>date article : <?php echo $Articles[$i]['DatePublication'] ?></time>
	</header>
	<p>contenu article : <?php echo $Articles[$i]['Contenu'] ?></p>
</article>
<hr />
<?php } ?>