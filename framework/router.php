<?php

//require_once 'controllers/ControllerAccueil.php';
//require_once 'controllers/ControllerArticle.php';
require_once 'requete.php';
require_once 'vue.php';

class Router
{

//    private $ctrlAccueil;
//
//    private $ctrlArticle;

    public function __construct()
    {
//        $this->ctrlAccueil = new ControllerAccueil();
//        $this->ctrlArticle = new ControllerArticle();
    }

    // Traite une requête entrante
    public function routerRequete()
    {
        try {

            $requete = new Requete(array_merge($_GET, $_POST));
            $controller = $this->creerController($requete);
            $action = $this->creerAction($requete);
            $controller->executerAction($action);
        } catch (Exception $e) {
            $this->gererErreur($e);
        }
    }

    // Crée le contrôleur approprié en fonction de la requête reçue
    private function creerController(Requete $requete)
    {
        $controller = "Accueil"; // Contrôleur par défaut
        if ($requete->existeParametre('action')) {
            try {
                if($requete->getParametre('action') == 'commenter'){
                    $controller = "Article";
                }else {
                    $controller = $requete->getParametre('action');
                }
            } catch (Exception $e) {
                echo $e;
            }
            // Première lettre en majuscule
            $controller = ucfirst(strtolower($controller));
        }
        // Création du nom du fichier du contrôleur
        $classeController = "Controller" . $controller;
        $fichierController = "controllers/" . $classeController . ".php";
        if (file_exists($fichierController)) {
            // Instanciation du contrôleur adapté à la requête
            require($fichierController);
            $controller = new $classeController();
            $controller->setRequete($requete);
            return $controller;
        }else
            throw new Exception("Fichier '$fichierController' introuvable");
        }
        // Détermine l'action à exécuter en fonction de la requête reçue
        private function creerAction(requete $requete) {
            $action = "index"; // Action par défaut
        if ($requete->existeParametre('action')) {
            try {
                $action = $requete->getParametre('action');
            } catch (Exception $e) {
                echo $e;
            }
        }
        return $action;
        }
        // Gère une erreur d'exécution (exception)
        private function gererErreur(Exception $exception) {
            $vue = new Vue('erreur');
            $vue->generer(array('msgErreur' => $exception->getMessage()));
        }
}
?>