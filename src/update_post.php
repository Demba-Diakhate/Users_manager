<?php
include_once "../config/config.php";

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$postData = $_POST;

if (
    !isset($postData['user_id'])
    || !is_numeric($postData['user_id'])
    || empty($postData['nametexte'])
    || empty($postData['email'])
    || trim(strip_tags($postData['nametexte'])) === ''
    || trim(strip_tags($postData['email'])) === ''
) {
    echo 'Il manque des informations pour permettre l\'édition du formulaire.';
    return;
}

$id = (int)$postData['user_id'];
$title = trim(strip_tags($postData['nametexte']));
$recipe = trim(strip_tags($postData['email']));

$insertRecipeStatement = $pdo->prepare('UPDATE users_list SET user_name = :user_name, user_email = :user_email WHERE user_id = :user_id');
$insertRecipeStatement->execute([
    'user_name' => $title,
    'user_email' => $recipe,
    'user_id' => $id,
]);
// echo 'Les informations ont été mises à jour avec succès.';


// Redirection vers la page d'accueil (index.php) après la modification
header("Location: ../index.php");
exit; // Toujours ajouter exit après une redirection pour stopper l'exécution du script
?>