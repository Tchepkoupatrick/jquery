<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $messageId = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    
    if ($messageId && deleteMessage($messageId)) {
        header('Location: view_messages.php?deleted=1');
        exit;
    }
}

header('Location: view_messages.php');
exit;
?>