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
        <title>Gemini Makeup - En construction</title>
        <link rel="stylesheet" type="text/css" href="./app/assets/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="./app/assets/css/style.css">
    </head>
    <body>
        <?php require "./app/includes/parts/header.php";?>
        <main>
            <section>
            <div class="wrapper under-construction">
                <div class="overlay-under-construction">
                    <h1>En construction</h1>
                </div>
            </div>
            </section>
        </main>
        <?php require "./app/includes/parts/footer.php"?>
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/eb416f51b7.js" crossorigin="anonymous"></script>
        <script src="./app/assets/js/slider.js"></script>
    </body>
</html>
