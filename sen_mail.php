<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);


if(!isset($_SESSION["user_id"])){
    header('location: connet.php');
    exit;
}



include "connect.php";
//Import PHPMailer classes into the global namespace
// //These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// //Load Composer's autoloader
// // require 'vendor/autoload.php';


// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $marque = $_POST['marque'];
    $model = $_POST['model'];
    $contact = $_POST['contact'];
    $annee = $_POST['annee'];
    $kilo = $_POST['kilometre'];
    $email = $_POST['mail'];
    $prix = $_POST['prixVente'];

    $messages = 'Bonjour, je suis '.$nom.';  Courriel: '.$email.', j\'aimerais éffectuer la vente d\'une voiture de modèle '.$model.', de marque 
    '.$marque.', avec un kilometrage de '.$kilo.'Km/h, dont j\'estime le prix à '.$prix.' FCFA. Mon Contact est le suivant: '.$contact;

    $sql = "INSERT INTO messagerie(mail, contenu) VALUES(?, ?)";
    $stmt = $con->prepare($sql);
    if ($stmt->execute([$email, $messages])) {
        echo 'success ';
    }else{
        header("Location:vendre.php");
    }


//Create an instance; passing `true` enables exceptions
// $mail = new PHPMailer(true);

// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = 'tchepkoupoel1@gmail.com';                     //SMTP username
//     $mail->Password   = 'evow emns enwe zkfq';                               //SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->setFrom('tchepkoupoel1@gmail.com', 'AOTOQUICK');
//     $mail->isHTML(true);
//     $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
//     $mail->addAddress('ellen@example.com');               //Name is optional
//     $mail->addReplyTo('info@example.com', 'Information');
//     $mail->addCC('cc@example.com');
//     $mail->addBCC('bcc@example.com');

//     //Attachments
//     $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//     $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Here is the subject';
//     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }

}