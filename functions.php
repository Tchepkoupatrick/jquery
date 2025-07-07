<?php
require_once 'connected.php';

// Envoyer un nouveau message
function sendMessage($email, $content) {
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO messages (email, content) VALUES (?, ?)");
    return $stmt->execute([$email, $content]);
}

// Récupérer tous les messages
function getAllMessages() {
    $db = getDB();
    $stmt = $db->query("SELECT * FROM messages ORDER BY created_at DESC");
    return $stmt->fetchAll();
}

// Récupérer un message spécifique
function getMessageById($id) {
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM messages WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// Mettre à jour une réponse
function updateResponse($messageId, $response) {
    $db = getDB();
    $stmt = $db->prepare("UPDATE messages SET response = ?, responded_at = NOW() WHERE id = ?");
    return $stmt->execute([$response, $messageId]);
}

// Compter les messages sans réponse
function countUnansweredMessages() {
    $db = getDB();
    $stmt = $db->query("SELECT COUNT(*) AS count FROM messages WHERE response IS NULL");
    return $stmt->fetch()['count'];
}

// Fonction pour supprimer un message
function deleteMessage($messageId) {
    $db = getDB();
    $stmt = $db->prepare("DELETE FROM messages WHERE id = ?");
    return $stmt->execute([$messageId]);
}

// Fonction pour envoyer une réponse par email
function sendEmailResponse($toEmail, $subject, $body) {
    try {
        $mail = configureMailer();
        $mail->addAddress($toEmail);
        $mail->Subject = $subject;
        $mail->Body = $body;
        
        return $mail->send();
    } catch (Exception $e) {
        error_log("Erreur d'envoi d'email: " . $mail->ErrorInfo);
        return false;
    }
}
?>