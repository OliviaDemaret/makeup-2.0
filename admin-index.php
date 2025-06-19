<?php
    require_once('./app/settings.php');

    // Déclaration et initalisation des variables
    $msg = null;
    $result = null;
    $execute = false;

    if(!is_object($conn)){       
        $msg = getMessage($conn, 'error');
    }else{
        
        // Va cherche en DB les articles publiés
        $result = getAllArticlesDB($conn);

        //DEBUG// disp_ar($result);

        // On vérifie le retour de la fonction  getAllArticlesDB(), elle doit nous retourner un tableau 
        // Si c'est un tableau, on continue donc on initialise $execute = true, sinon on affiche le message d'erreur retourné par la fonction     
        (isset($result) && is_array($result))? $execute = true : $msg = getMessage($result, 'error');            
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <title>Gemini Makeup - Admin</title>
        <link rel="stylesheet" type="text/css" href="./app/assets/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="./app/assets/css/style.css">
    </head>
    <body>
    <?php require "./app/includes/parts/admin-header.php";?>
    <div class="admin-body">
    <?php require "./app/includes/parts/admin-nav-secondary.php";?>
        <main>
            <section id="admin-index">
                <div class="wrapper admin-index">
                    <h1>Bonjour, Admin<!--Admin name--></h1>
                    <div class="admin-actions">
                        <a href="./admin-add-article.php"><div class="actions add-product"><i class="fa-solid fa-plus"></i><p>Ajouter<br> un article</p></div></a>
                        <a href="./under-construction.php"><div class="actions add-category"><i class="fa-solid fa-plus"></i><p>Ajouter une<br> catégorie</p></div></a>
                        <a href="./under-construction.php"><div class="actions add-client"><i class="fa-solid fa-plus"></i><p>Ajouter<br> un client</p></div></a>
                    </div>
                </div>
            </section>
        </main>
    </div>
        <?php require "./app/includes/parts/footer.php"?>
        <script src="https://kit.fontawesome.com/eb416f51b7.js" crossorigin="anonymous"></script>
    </body>
    </html>