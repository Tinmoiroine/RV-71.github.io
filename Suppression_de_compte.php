<?php
// Nom du fichier
$nom_fichier = "RV-71/DATA/test.txt";

// Lire toutes les lignes du fichier dans un tableau
$lignes = file($nom_fichier);

// Ligne à supprimer (par exemple, la ligne numéro 3)
$ligne_a_supprimer = 3;

// Supprimer la ligne spécifique du tableau
unset($lignes[$ligne_a_supprimer - 1]); // Soustraire 1 car les tableaux sont indexés à partir de 0

// Réécrire le contenu du fichier en joignant les lignes du tableau
$nouveau_contenu = implode("", $lignes);

// Écrire le nouveau contenu dans le fichier
file_put_contents($nom_fichier, $nouveau_contenu);

echo "La ligne a été supprimée avec succès du fichier.";
?>
