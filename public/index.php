<?php

require_once '../core/Router.php';
require_once '../app/controllers/front/HomeController.php';

use App\Core\Router;
use App\Controllers\HomeController;

// Créer une instance du routeur
$router = new Router();

// Ajouter des routes
$router->add('/', ['controller' => 'Home', 'action' => 'index']);
$router->add('/home', ['controller' => 'Home', 'action' => 'index']);
$router->add('/about', ['controller' => 'Home', 'action' => 'about']);


// Récupérer l'URL de la requête
$url = $_SERVER['REQUEST_URI'];

// Vérifier si l'URL correspond à une route
if ($router->match($url)) {
    $params = $router->getParams();
    $controllerName = $params['controller'] . 'Controller';
    $action = $params['action'];

    // Inclure le contrôleur
    require_once '../app/controllers/' . $controllerName . '.php';
    
    // Créer une instance du contrôleur
    $controller = new $controllerName();

    // Appeler l'action du contrôleur
    $controller->$action();
} else {
    echo "Page non trouvée!";
}
