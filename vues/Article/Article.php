<!DOCTYPE html>

<article>
	<header>
        <h1 class="titreArticle">Titre article : <?php echo $Article['Titre'] ?></h1>
        <time>date article : <?php echo $Article['DatePublication'] ?></time>
	</header>
    <p>contenu article : <?php echo $Article['Contenu'] ?></p>
</article>
<hr color = "red"/>
<header>
    <h1 class="titreArticle"> Commentaires :</h1>
    <?php foreach ($Commentaire as $item){ ?>
        <p>auteur commentaire : <?php echo $item['Auteur'] ?></p>
        <p>contenu commentaire : <?php echo $item['Contenu'] ?> </p>
        <br/>
        <hr color="light-blue"/>
    <?php }?>

<form method="post" action="index.php?action=commenter">
	<input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required />
    <br />
	<textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire" required>
    </textarea>
	<br />
    <input type="hidden" name="id" value="<?php echo $Article['Id'] ?>" />
    <input type="submit" value="Commenter" />
</form>