<?php
        include_once "config/config.php";
        // On récupère tout le contenu de la table recipes
        $sqlQuery = 'SELECT * FROM users_list';
        $recipesStatement = $pdo->prepare($sqlQuery);
        $recipesStatement->execute();
        $users = $recipesStatement->fetchAll();
    ?>

<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Prenom Nom</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user):?>
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3"><?php echo $user['user_name']; ?></td>
                            <td class="px-4 py-3"><?php echo $user['user_email']; ?></td>
                            <td class="px-4 py-3 text-green-500 cursor-pointer w-1/12"><a href="src/updateUser.php?user_id=<?php echo $user['user_id']; ?>">update</a></td>
                            <td class="px-4 py-3 text-red-500 cursor-pointer w-1/12"><a href="src/deleteUser.php?user_id=<?php echo $user['user_id']; ?>">delete</a></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
