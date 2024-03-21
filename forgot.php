<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = $_POST["e-mail"];
    $fichier = 'RV-71/DATA/mail.txt';
    $li = file($fichier, FILE_IGNORE_NEW_LINES);
    $email_trouve = false;

    foreach ($li as $index => $ligne) 
    {
        if (trim($ligne) == $mail) 
        {
            $destinataire = $mail;

            $fiche1 = 'RV-71/DATA/Prenom.txt';
            $ligne1 = file($fiche1, FILE_IGNORE_NEW_LINES);
            $inf1 = $ligne1[$index];

            $fiche2 = 'RV-71/DATA/NOM.txt';
            $ligne2 = file($fiche2, FILE_IGNORE_NEW_LINES);
            $inf2 = $ligne2[$index];

            $fiche3 = 'RV-71/DATA/interpellation.txt';
            $ligne3 = file($fiche3, FILE_IGNORE_NEW_LINES);
            $inf3 = $ligne3[$index];

            $fiche4 = 'RV-71/DATA/identifiants.txt';
            $ligne4 = file($fiche4, FILE_IGNORE_NEW_LINES);
            $inf4 = $ligne4[$index];

            $fiche5 = 'RV-71/DATA/mdp.txt';
            $ligne5 = file($fiche5, FILE_IGNORE_NEW_LINES);
            $inf5 = $ligne5[$index];

            $sujet = "Recuperation Identifiants RV-71";
            $message = "Bonjour " . $inf3 . " " . $inf1 . " " . $inf2 . "\n \n Voici vos identifiants de connexion : \n \n Identifiant : " . $inf4 . "\n Mot de passe : " . $inf5 . "\n \n En vous remerciant de recourir a nos services, \n \n Bien a vous, \n \n L'Equipe RV-71.";
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp-mail.outlook.com'; // Remplacez par le serveur SMTP de votre fournisseur
            $mail->SMTPAuth = true;
            $mail->Username = 'applicationpython@outlook.fr'; // Remplacez par votre adresse e-mail
            $mail->Password = 'App30!coucou'; // Remplacez par votre mot de passe e-mail
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('applicationpython@outlook.fr', 'RV-71');
            $mail->addAddress($destinataire);
            $mail->Subject = $sujet;
            $mail->Body = $message;
            if ($mail->send()) {
                echo "L'e-mail a été envoyé avec succès.";
                header("Location: index.html");
                exit();
            } else {
                echo "Une erreur s'est produite lors de l'envoi de l'e-mail : " . $mail->ErrorInfo;
            }
            $email_trouve = true;
            break;
        }
    }

    if (!$email_trouve) {
        echo "Aucun e-mail correspondant trouvé dans le fichier.";
    }

}
else 
{
    header("Location: connexion.html");
    exit();
}
?>
