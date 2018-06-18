<?php

require_once 'modeles/Article.php';
require_once 'framework/vue.php';
require_once 'framework/Controller.php';

class ControllerAccueil extends Controller
{

    private $article;

    public function __construct()
    {
        $this->article = new Article();
    }
    public function accueil(){
        $Article = $this->article -> getArticles();
        parent::genererVue(array('Articles' => $Article));
    }
    public function index()
    {
        $Article = $this->article -> getArticles();
        parent::genererVue(array('Articles' => $Article));
    }
}