<?php
include_once "../config/config.php";

$getData = $_GET;

if (!isset($getData['user_id']) || !is_numeric($getData['user_id'])) {
    echo('Il faut un identifiant pour la suppression.');
    return;
}

$deleteRecipeStatement = $pdo->prepare('DELETE FROM users_list WHERE user_id = :user_id');
$deleteRecipeStatement->execute([
    'user_id' => (int)$getData['user_id'],
]) or die(print_r($mysqlClient->errorInfo()));

header("Location: ../index.php");
?>