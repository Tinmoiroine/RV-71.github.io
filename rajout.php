<?php
// Nom du fichier contenant les identifiants
$nom_fichier = "RV-71/DATA/test.txt";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'identifiant soumis par l'utilisateur
    $nouvel_identifiant = $_POST["identifiant"];

    // Ajouter un saut de ligne si le fichier n'est pas vide
    $contenu = file_get_contents($nom_fichier);
    if (!empty($contenu)) 
    {
        $contenu .= "\n";
    }

    // Ajouter le nouvel identifiant à la fin du fichier
    $contenu .= $nouvel_identifiant;

    // Écrire le nouveau contenu dans le fichier
    file_put_contents($nom_fichier, $contenu);

    echo "L'identifiant a été ajouté avec succès au fichier.";
} else {
    // Afficher le formulaire pour saisir l'identifiant
    echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
    echo 'Identifiant: <input type="text" name="identifiant"><br>';
    echo '<input type="submit" value="Valider">';
    echo '</form>';
}
?>
