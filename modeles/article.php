<?php
require_once 'framework/modele.php';
require_once 'commentaire.php';

class Article extends Modele
{

    // Renvoie la liste des articles du blogx
    public function getArticles()
    {

        $reqArt = "SELECT * FROM Article";
        $result = $this->executerRequete($reqArt)->fetchAll();
        return $result;
    }

    // Renvoie les informations sur un Article
    public function getArticle($idArticle)
    {
        $reqArt = "SELECT * FROM Article WHERE id= $idArticle";
        return $this->executerRequete($reqArt)->fetch();
    }
}
?>