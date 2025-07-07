<?php
require_once 'functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $messageId = filter_input(INPUT_POST, 'messageId', FILTER_VALIDATE_INT);
    $response = trim(filter_input(INPUT_POST, 'response', FILTER_SANITIZE_STRING));
    
    if ($messageId && !empty($response)) {
        if (updateResponse($messageId, $response)) {
            echo json_encode([
                'success' => true,
                'unansweredCount' => countUnansweredMessages()
            ]);
            exit;
        }
    }
}

echo json_encode([
    'success' => false, 
    'error' => 'Requête invalide',
    'unansweredCount' => countUnansweredMessages()
]);
?>