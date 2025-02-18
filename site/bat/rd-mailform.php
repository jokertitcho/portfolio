<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $name = $_POST['name'];  // Modifié pour correspondre au name du formulaire
    $email = $_POST['email']; // Modifié pour correspondre au name du formulaire
    $phone = $_POST['phone']; // Modifié pour correspondre au name du formulaire
    $message = $_POST['message']; // Ajouté pour le champ message

    // Création d'une nouvelle instance de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'engoulevent.o2switch.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'contact@mtl-web.fr';
        $mail->Password = '123pifpafpouf';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->SMTPDebug = 3;
        $mail->Debugoutput = 'html';
        
        // Email au client
        $mail->setFrom($email, 'Votre Restaurant');
        $mail->addAddress('contact@mtl-web.fr');
        $mail->isHTML(true);
        $mail->Subject = 'Confirmation de votre message';
        $mail->Body = "
            <h1>Merci pour votre message</h1>
            <p>Nous avons bien reçu votre message et nous vous répondrons dans les plus brefs délais.</p>
            <p>Récapitulatif de vos informations :</p>
            <ul>
                <li>Nom : $name</li>
                <li>Email : $email</li>
                <li>Téléphone : $phone</li>
                <li>Message : $message</li>
            </ul>";
        $mail->send();
        
        // Email au gestionnaire
        /* $mail->clearAddresses();
        $mail->addAddress('contact@mtl-web.fr');
        $mail->Subject = 'Nouveau message du formulaire de contact';
        $mail->Body = "
            <h1>Nouveau message</h1>
            <p>Un nouveau message a été envoyé via le formulaire de contact :</p>
            <ul>
                <li>Nom : $name</li>
                <li>Email : $email</li>
                <li>Téléphone : $phone</li>
                <li>Message : $message</li>
            </ul>";
        $mail->send(); */
        
        die('MF000');
    } catch (phpmailerException $e) {
        die('MF254');
    } catch (Exception $e) {
        die('MF255');
    }
}
?>