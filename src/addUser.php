<?php
include_once "../config/config.php";
// Verification du formulaire soumis
if(isset($_POST['send'])){
if(
    !isset($_POST['nametexte']) || !isset($_POST['email'])
){
    echo 'Remplir le formulaire.';
    return;
}

$nametexte = $_POST['nametexte'];
$email = $_POST['email'];
// Ecriture de la requête
$sqlQuery = 'INSERT INTO users_list(user_name, user_email) VALUES (:user_name, :user_email)';

// Préparation
$insertRecipe = $pdo->prepare($sqlQuery);

// Exécution ! La recette est maintenant en base de données
try {
    $insertRecipe->execute([
        'user_name' => $nametexte,
        'user_email' => $email,
    ]);

    echo "L'utilisateur a été ajouté avec succès !";

} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

// Redirection vers la page d'accueil (index.php) après la modification
header("Location: ../index.php");
exit; // Toujours ajouter exit après une redirection pour stopper l'exécution du script
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
    <title>Document</title>
</head>
<body>
    <div class="w-2/4 mx-auto mt-52">
    <form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prenom Nom</label>
    <input type="text" name="nametexte" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputPassword1" required>
  </div>
  <button type="submit" name="send" class="btn btn-primary bg-gray-800 border-none">Submit</button>
</form>
    </div>
</body>