<?php
require_once 'framework/modele.php';

class Commentaire extends Modele
{

    // Renvoie la liste des commentaires associés à un Article
    public function getCommentaires($idArticle)
    {
        $reqCom  = "SELECT * FROM commentaire WHERE IdArticle = $idArticle";
        return $this->executerRequete($reqCom)->fetchAll();
    }

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $idArticle)
    {
        $date = date("Y-m-d");
        $reqCom = "INSERT INTO commentaire(IdArticle,Auteur,Contenu,DatePublication) values ($idArticle,'$auteur','$contenu','$date');";
        return $this->executerRequete($reqCom);
    }
}
?>