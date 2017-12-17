<?php
namespace Sumwar;

class Application
{
  private $config;
  private $router;

  /**
   * Initialisation de l'application
   */
  public function __construct()
  {
    // Récupération de la config
    $this->config = parse_ini_file('config.conf');

    // Configuration de la base de données
    Models\Database::setConfig($this->config);

    // Instanciation du router
    $this->router = new \AltoRouter();

    // Configuration du chemin de base
    $this->router->setBasePath($this->config["BASEPATH"]);

    // On ajoute un match type custom pour le slug
    $this->router->addMatchTypes(array('slg' => '[a-z-]++'));

    // Définition des routes du site
    $this->defineRoutes();
  }

  /**
  * Configuration des routes
  */
  private function defineRoutes()
  {
    $this->router->map('GET', '/', ['MainController', 'home'], 'home');
    $this->router->map('GET', '/mob/[slg:slug]', ['MobController', 'show'], 'mob_show');
  }

  /**
   * Exécution de l'application
   * le FrontController reçoit la requête, match la route puis dispatch
   */
  public function run()
  {
    // On match de la route demandée
    $match = $this->router->match();

    // Si la route a été trouvée on récupère et traite les infos retournées par AltoRouter
    if ($match) {
      // Le nom du Controller à appeler se trouve dans $match['target'][0]
      $controllerName = 'Sumwar\\Controllers\\'.$match['target'][0];
      // La méthode du Controller à appeler dans $match['target'][1]
      $actionName = $match['target'][1];
      // Les paramètres dans l'URL (ex: id, slug, ...)
      $params = $match['params'];

      // On instancie le Controller
      $controller = new $controllerName($this->router, $this->config);
      // On appelle la méthode
      $controller->$actionName($params);
    } else {
      echo 'Error 404';
    }
  }
}
