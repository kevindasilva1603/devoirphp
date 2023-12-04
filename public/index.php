<?php

require_once __DIR__ . '/../vendor/autoload.php';




$dotenv = Dotenv\Dotenv::createImmutable(realpath(__DIR__ . '/..'));
$dotenv->load();

// Création d'une instance du routeur
$router = new SimpleRouter();

// Inclure le namespace du contrôleur
use Devoir\Php\Controller\PostController;

// Définition des routes
$router->get('/', function() {
    $postController = new DEVOIRPHP\Controller\PostController();
    $postController->index();
});



$router->get('/articles/{id}', [PostController::class, 'show']);
$router->get('/articles/create', [PostController::class, 'create']);
// Réactiver ces lignes après avoir ajouté la méthode post dans SimpleRouter
// $router->post('/articles', [PostController::class, 'store']);
$router->get('/articles/{id}/edit', [PostController::class, 'edit']);
// $router->post('/articles/{id}', [PostController::class, 'update']);
// $router->post('/articles/{id}/delete', [PostController::class, 'destroy']);

// Traitement de la requête actuelle
try {
    $router->dispatch(parseUrl());
} catch (NotFoundException $e) {
    http_response_code(404);
    echo "Page non trouvée.";
} catch (Exception $e) {
    http_response_code(500);
    echo "Erreur serveur.";
}

// Fonction pour nettoyer l'URI
function parseUrl() {
    $uri = str_replace('/DevoirPhp/public', '', $_SERVER['REQUEST_URI']);
    $uri = explode('?', $uri)[0];
    return $uri;
}

class SimpleRouter {
    private $getRoutes = [];
    private $postRoutes = [];

    public function get($uri, $callback) {
        $this->getRoutes[$uri] = $callback;
    }

    public function post($uri, $callback) {
        $this->postRoutes[$uri] = $callback;
    }

    public function dispatch($uri) {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'GET' && array_key_exists($uri, $this->getRoutes)) {
            call_user_func($this->getRoutes[$uri]);
        } elseif ($method == 'POST' && array_key_exists($uri, $this->postRoutes)) {
            call_user_func($this->postRoutes[$uri]);
        } else {
            throw new NotFoundException("No route found for URI: $uri");
        }
    }
}

class NotFoundException extends Exception {}
?>
