<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les valeurs des champs
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $mail = $_POST["mail"];
    $tel = $_POST["tel"];
    $identifiant = $_POST["identifiant"];
    $mdp = $_POST["mdp"];
    $cmdp = $_POST["cmdp"]; 
    $interp =  $_POST["interp"];

    // Chemin du fichier identifiants.txt
    $chemin_fichier1 = 'RV-71/DATA/identifiants.txt';
    $chemin_fichier2 = 'RV-71/DATA/mdp.txt';
    $chemin_fichier3 = 'RV-71/DATA/immattricule.txt';
    $chemin_fichier4 = 'RV-71/DATA/Prenom.txt'; 
    $chemin_fichier5 = 'RV-71/DATA/NOM.txt'; 
    $chemin_fichier6 = 'RV-71/DATA/interpellation.txt'; 
    $chemin_fichier7 = 'RV-71/DATA/mail.txt'; 
    $chemin_fichier8 = 'RV-71/DATA/tel.txt';

    // Lire le contenu du fichier dans un tableau
    $identifiants = file($chemin_fichier1, FILE_IGNORE_NEW_LINES);
    $mdps = file($chemin_fichier2, FILE_IGNORE_NEW_LINES);
    $immattricule = file($chemin_fichier3, FILE_IGNORE_NEW_LINES);
    $prenoms = file($chemin_fichier4, FILE_IGNORE_NEW_LINES); 
    $noms = file($chemin_fichier5, FILE_IGNORE_NEW_LINES); 
    $interpellations = file($chemin_fichier6, FILE_IGNORE_NEW_LINES); 
    $mails = file($chemin_fichier7, FILE_IGNORE_NEW_LINES); 
    $tels = file($chemin_fichier8, FILE_IGNORE_NEW_LINES);

    // Initialiser la variable pour stocker la ligne où se trouve l'identifiant
    $numero_ligne = 6;
    $numero_ligne1 = null;  

        // Vérifier si l'identifiant est présent dans le tableau
    if ($mdp == $cmdp) 
    {
        $contenu = file_get_contents($chemin_fichier1);
        if (!empty($contenu)) 
        {
            $contenu .= "\n";
        }
        $contenu .= $identifiant;
        file_put_contents($chemin_fichier1, $contenu);

        $contenu = file_get_contents($chemin_fichier2);
        if (!empty($contenu)) 
        {
            $contenu .= "\n";
        }
        $contenu .= $mdp;
        file_put_contents($chemin_fichier2, $contenu);

        $contenu = file_get_contents($chemin_fichier3);
        if (!empty($contenu)) 
        {
            $contenu .= "\n";
        }
        $contenu .= "test";
        file_put_contents($chemin_fichier3, $contenu);

        $contenu = file_get_contents($chemin_fichier4);
        if (!empty($contenu)) 
        {
            $contenu .= "\n";
        }
        $contenu .= $prenom;
        file_put_contents($chemin_fichier4, $contenu);

        $contenu = file_get_contents($chemin_fichier5);
        if (!empty($contenu)) 
        {
            $contenu .= "\n";
        }
        $contenu .= $nom;
        file_put_contents($chemin_fichier5, $contenu);

        $contenu = file_get_contents($chemin_fichier6);
        if (!empty($contenu)) 
        {
            $contenu .= "\n";
        }
        $contenu .= $interp;
        file_put_contents($chemin_fichier6, $contenu);

        $contenu = file_get_contents($chemin_fichier7);
        if (!empty($contenu)) 
        {
            $contenu .= "\n";
        }
        $contenu .= $mail;
        file_put_contents($chemin_fichier7, $contenu);

        $contenu = file_get_contents($chemin_fichier8);
        if (!empty($contenu)) 
        {
            $contenu .= "\n";
        }
        $contenu .= $tel;
        file_put_contents($chemin_fichier8, $contenu);

        echo "Inscription réussie !";
        header("Location: index.html");
        exit();

    }
    else 
    {
        echo '<script>alert("Les Mots de Passes saisis ne sont pas identiques");</script>';
    }
} 
else 
{
    // Le formulaire n'a pas été soumis, redirigez l'utilisateur vers la page de connexion
    header("Location: signin.html");
    exit();
}
?>
