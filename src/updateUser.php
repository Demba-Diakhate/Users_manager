<?php
include_once "../config/config.php";

$getData = $_GET;

if (!isset($getData['user_id']) || !is_numeric($getData['user_id'])) {
    echo('Il faut un identifiant pour la modification.');
    return;
}

$retrieveRecipeStatement = $pdo->prepare('SELECT * FROM users_list WHERE user_id = :user_id');
$retrieveRecipeStatement->execute([
    'user_id' => (int)$getData['user_id'],
]);
$recipe = $retrieveRecipeStatement->fetch(PDO::FETCH_ASSOC);

// si la recette n'est pas trouvée, renvoyer un message d'erreur
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
    <form action="update_post.php" method="POST">
    <input type="hidden" name="user_id" value="<?php echo($getData['user_id']); ?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prenom Nom</label>
    <input type="text" name="nametexte" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo($recipe['user_name']); ?>" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputPassword1" value="<?php echo($recipe['user_email']); ?>" required>
  </div>
  <button type="submit" name="send" class="btn btn-primary bg-gray-800 border-none">Submit</button>
</form>
    </div>
</body>