<?php
// Récupérer l'identifiant envoyé depuis la requête POST
$identifiant = $_POST['identifiant'];

// Chemin du fichier contenant les identifiants
$chemin_fichier = 'RV-71/DATA/identifiants.txt';

// Lire le contenu du fichier dans un tableau
$identifiants = file($chemin_fichier, FILE_IGNORE_NEW_LINES);

// Initialiser la variable pour stocker la ligne où se trouve l'identifiant
$numero_ligne = null;

// Parcourir le tableau des identifiants pour trouver l'identifiant et son numéro de ligne
foreach ($identifiants as $index => $ligne) {
    if (trim($ligne) == $identifiant) {
        // Ajouter 1 au numéro de ligne car les tableaux commencent à l'index 0, mais les lignes à 1
        $numero_ligne = $index + 1;
        break;
    }
}

// Vérifier si l'identifiant est présent dans le tableau
if ($numero_ligne !== null) {
    echo "L'identifiant $numero_ligne est valide !";
} else {
    echo "L'identifiant n'est pas valide !";
}
?>
