<?php 

namespace DEVOIRPHP\Controller;


use App\Model\PostModel;

class PostController {
    private $model;

    public function __construct() {
        $this->model = new PostModel();
    }

    public function index() {
        $posts = $this->model->getAllPosts();
        require '../src/View/post/index.php';
    }

    public function show($id) {
        $post = $this->model->getPostById($id);
        if (!$post) {
            // Gérer le cas où l'article n'existe pas
            http_response_code(404);
            echo "Article non trouvé";
            return;
        }
        require '../src/View/post/show.php';
    }

    public function create() {
        require '../src/View/post/create.php';
    }

    public function store() {
        // Logique pour traiter les données du formulaire de création
        // ...
    }

    public function edit($id) {
        $post = $this->model->getPostById($id);
        if (!$post) {
            // Gérer le cas où l'article n'existe pas
            http_response_code(404);
            echo "Article non trouvé";
            return;
        }
        require '../src/View/post/edit.php';
    }

    public function update($id) {
        // Logique pour traiter les données du formulaire de modification
        // ...
    }

    public function delete($id) {
        // Logique pour supprimer un article
        // ...
    }
}
?>
