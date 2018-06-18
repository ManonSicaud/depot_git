<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" href="css/style.css" />
<title><?= $titre ?></title>
</head>
<body>
	<div id="global">
		<header>
			<a href="index.php">
				<h1 id="titreBlog">Mon Blog</h1>
			</a>
			<p>Je vous souhaite la bienvenue sur ce blog.</p>
		</header>
		<div id="contenu">
<?= $contenu ?>
</div>
		<!-- #contenu -->
		<footer id="piedBlog"> Blog réalisé avec le modèle MVC. </footer>
	</div>
	<!-- #global -->
</body>
</html>