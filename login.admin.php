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
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gemini Makeup - Login Admin</title>
        <link rel="stylesheet" type="text/css" href="./styles/normalize.css" />
        <link rel="stylesheet" type="text/css" href="./styles/style.css" />
    </head>
    <body>
        <?php require "./includes/parts/header.php";?>
        <main>
            <section id="login">
                <div class="wrapper login">
                <h2>Login Admin</h2>
                    <form method="post" class="login-form">
                        <input type="text" placeholder="adresse mail" name="Adresse mail">
                        <input type="password" placeholder="mot de passe" name="Mot de passe">
                        <button type="submit">Continue</button>
                    </form>
                    <div><a href="./under-construction-page.php">Term & Conditions</a><span> - </span><a href="./under-construction-page.php">Policy</a></div>
                </div>
            </section>
        </main>
        <?php require "./includes/parts/footer.php"?>
        <script src="https://kit.fontawesome.com/eb416f51b7.js" crossorigin="anonymous"></script>
    </body>
</html>