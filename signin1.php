<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les valeurs des champs
    $tel = $_POST["tel"];
    $interp =  $_POST["interp"];

    // Chemin du fichier identifiants.txt
    $chemin_fichier6 = 'RV-71/DATA/interpellation.txt'; 
    $chemin_fichier8 = 'RV-71/DATA/tel.txt';

    // Lire le contenu du fichier dans un tableau
    $interpellations = file($chemin_fichier6, FILE_IGNORE_NEW_LINES); 
    $tels = file($chemin_fichier8, FILE_IGNORE_NEW_LINES);

    // Initialiser la variable pour stocker la ligne où se trouve l'identifiant
    $numero_ligne = 6;
    $numero_ligne1 = null;  

        // Vérifier si l'identifiant est présent dans le tableau


    $contenu = file_get_contents($chemin_fichier6);
    if (!empty($contenu)) 
    {
        $contenu .= "\n";
    }
    $contenu .= $interp;
    file_put_contents($chemin_fichier6, $contenu);


    $contenu = file_get_contents($chemin_fichier8);
    if (!empty($contenu)) 
    {
        $contenu .= "\n";
    }
    $contenu .= $tel;
    file_put_contents($chemin_fichier8, $contenu);
    header("Location: index.html");
    exit();
} 
else 
{
    // Le formulaire n'a pas été soumis, redirigez l'utilisateur vers la page de connexion
    header("Location: signin.html");
    exit();
}
?>
