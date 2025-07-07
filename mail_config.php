<?php



require_once __DIR__ . '/PHPMailer/src/Exception.php';
require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require 'vendor/autoload.php'; // Si vous utilisez composer

function configureMailer() {
    try {
        $mail = new PHPMailer(true);

        // Configuration SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tchepkoupoel1@gmail.com';
        $mail->Password = 'hvem gjmd gqjv cnvc';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Expéditeur par défaut
        $mail->setFrom('tchepkoupoel1@gmail.com', 'AUTOQUICK'); // Utiliser une adresse valide

        return $mail;
    } catch (Exception $e) {
        error_log("Erreur lors de la configuration de PHPMailer: " . $e->getMessage());
        return null; // Retourner null en cas d'erreur
    }
}
?>