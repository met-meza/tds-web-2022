<?php
include_once '../phpmailer/vendor/autoload.php';
include_once '/home/user/info_mail_secret_apache.php';
use PHPMailer\PHPMailer\PHPMailer;

$prenom = $_POST["nom_prenom"]??"Anonyme";
$mail = $_POST["mail"];
$objet = $_POST["objet"]??"SITE WEB";
$message = $_POST["message"];

function sendMail(string $from, string $from_name, string $subject, string $body) {
    $mail = new PHPMailer(true);  // Crée un nouvel objet PHPMailer
    $mail->IsSMTP(); // active SMTP
    $mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
    $mail->SMTPSecure = 'tls'; //or ssl
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;

    //Pour autoriser un envoi depuis 127.0.0.1
    $mail->SMTPOptions = [
            "ssl"=>[
            "verify_peer"=>false,
    "verify_peer_name"=>false,
    "allow_self_signed"=>true
    ]
    ];

    $mail->SMTPAuth = true;  // Authentification SMTP active
    $mail->Username = $special_mail;
    $mail->Password = $special_password;

    echo $special_mail;
    echo $special_password;

    $mail->isHTML(true);
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    $mail->Send();
}

try{
    sendMail($mail, $prenom, $objet, $message);
    echo 'Message envoyé';
}catch (\Exception $e){
    echo "Erreur lors de l'envoi de votre message!";
}
header('Location: ../index.php');
?>