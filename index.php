
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
     <?php include "src/navBar.php"; ?>
     <div class="flex justify-end p-2">
     <a href="src/addUser.php" class="w-20 h-10 bg-gray-800 rounded-lg text-white flex justify-center items-center">Ajouter</a>
     </div>
    <?php include "src/showUsers.php"; ?>
</body>
</html>