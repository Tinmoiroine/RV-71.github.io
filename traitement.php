<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les valeurs des champs
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Chemin du fichier identifiants.txt
    $chemin_fichier1 = 'RV-71/DATA/identifiants.txt';
    $chemin_fichier2 = 'RV-71/DATA/mdp.txt';

    // Chemin immatricules
    $chemin_fichier3 = 'RV-71/DATA/immattricule.txt';

    // Lire le contenu du fichier dans un tableau
    $identifiants = file($chemin_fichier1, FILE_IGNORE_NEW_LINES);
    $mdps = file($chemin_fichier2, FILE_IGNORE_NEW_LINES);
    $immattricule = file($chemin_fichier3, FILE_IGNORE_NEW_LINES);

    // Initialiser la variable pour stocker la ligne où se trouve l'identifiant
    $numero_ligne = 6;
    $numero_ligne1 = null;  


    // Parcourir le tableau des identifiants pour trouver l'identifiant et son numéro de ligne
    foreach ($identifiants as $index => $ligne) 
    {
        if (trim($ligne) == $username) 
        {
            // Ajouter 1 au numéro de ligne car les tableaux commencent à l'index 0, mais les lignes à 1
            $numero_ligne = $index + 1;
            break;
        }
    }
    foreach ($mdps as $index => $ligne1) 
    {
        if (trim($ligne1) == $password) 
        {
            // Ajouter 1 au numéro de ligne car les tableaux commencent à l'index 0, mais les lignes à 1
            $numero_ligne1 = $index + 1;
            break;
        }
    }

        // Vérifier si l'identifiant est présent dans le tableau
    if ($numero_ligne == $numero_ligne1) 
    {
        echo "L'identifiant $numero_ligne est valide !";
        $envoie = $numero_ligne-1;
        header("Location: RV-71.php?user=" . urlencode($envoie));
        exit();
    }
    else 
    {
        echo "L'identifiant n'est pas valide !";
    }
    // Comparez les identifiants avec ceux stockés dans votre système
} 
else 
{
    // Le formulaire n'a pas été soumis, redirigez l'utilisateur vers la page de connexion
    header("Location: connexion.html");
    exit();
}
?>
