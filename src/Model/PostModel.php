<?php 


namespace App\Model;

use PDO;
use PDOException;

class PostModel {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données: " . $e->getMessage();
            exit;
        }
    }

    public function getAllPosts() {
        try {
            $stmt = $this->db->query("SELECT * FROM posts ORDER BY created_at DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des articles: " . $e->getMessage();
            return [];
        }
    }

    public function getPostById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM posts WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de l'article: " . $e->getMessage();
            return null;
        }
    }

    // Méthodes pour créer, mettre à jour et supprimer des articles
    // ...
}
?>