<?php

require_once 'modeles/Article.php';
require_once 'modeles/commentaire.php';
require_once 'framework/vue.php';
require_once 'framework/Controller.php';

class ControllerArticle extends Controller {
    private $article;
    private $commentaire;
    public function __construct() {
        $this->article = new Article();
        $this->commentaire = new Commentaire();
    }
    // Affiche les détails sur un Article
    public function Article() {
        $idArticle = $this->requete->getParametre('id');

        $article = $this->article->getArticle($idArticle);
        $commentaire = $this->commentaire->getCommentaires($idArticle);

        parent::genererVue(array('Article' => $article,'Commentaire' => $commentaire));
    }
    // Ajoute un commentaire à un Article
    public function commenter(){
        $auteur = $this->requete->getParametre('auteur');
        $contenu = $this->requete->getParametre('contenu');
        $idArticle = $this->requete->getParametre('id');
        $this->commentaire->ajouterCommentaire($auteur,$contenu,$idArticle);

        $this->article();
    }

    public function index()
    {
        // TODO: Implement index() method.
    }
}