<?php

require_once 'Requete.php';
require_once 'vue.php';

abstract class Controller
{
    private $action;
    // Requête entrante
    protected $requete;
    // Définit la requête entrante
    public function setRequete(Requete $requete) {
        $this->requete = $requete;
    }
    // Exécute l'action à réaliser
    public function executerAction($action) {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $classeController = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $classeController");
        }
    }
    // Méthode abstraite correspondant à l'action par défaut
    // Oblige les classes dérivées à implémenter cette action par défaut
    public abstract function index();
    // Génère la vue associée au contrôleur courant
    protected function genererVue($donneesVue = array()) {
    // Détermination du nom du fichier vue à partir du nom du contrôleur actuel
        $classeController = get_class($this);
        $controller = str_replace("Controller", "", $classeController);
    // Instanciation et génération de la vue
        $vue = new Vue($this->action, $controller);
        $vue->generer($donneesVue);
    }
}