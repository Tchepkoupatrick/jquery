<?php
// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'autoquick');

// Connexion à la base de données
function getDB() {
    static $pdo = null;
    static $connected = false; // Ajout d'une variable statique pour suivre la connexion

    if ($pdo === null) {
        try {
            $pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
            // if (!$connected) { // Affiche le message uniquement si ce n'est pas déjà fait
            //     echo 'Connexion à la base de données réussie.';
            //     $connected = true; // Marque la connexion comme réussie
            // }
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }
    return $pdo;
}


// Compter les messages sans réponse

// function countUnansweredMessages() {
//     $db = getDB();
//     $stmt = $db->query("SELECT COUNT(*) AS count FROM messages WHERE response IS NULL");
//     return $stmt->fetch()['count'];
// }
?>