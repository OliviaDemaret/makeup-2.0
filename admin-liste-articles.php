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
        <title>Gemini Makeup - Admin - Liste d'articles</title>
        <link rel="stylesheet" type="text/css" href="./app/assets/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="./app/assets/css/style.css">
    </head>
    <body>
    <?php require "./app/includes/parts/admin-header.php";?>
        <div class="admin-liste-articles">
        <?php require "./app/includes/parts/admin-nav-secondary.php";?>
                <main>
                    <section id="admin-liste-articles">
                        <div class="wrapper ">
                            <div class="admin-liste-article">
                                <div class="admin-liste-articles-header">
                                    <h1>Liste articles</h1> 
                                    <input class="liste-article-button" type="button" value="Ajouter un article">
                                </div>
                                <div class="zone-recherche">
                                    <input class="recherche-article" type="search" placeholder="Rechercher un article">
                                    <input class="liste-article-button" type="button" value="Rechercher des articles">
                                </div>
                                <div class="tableau-liste-articles">
                                    <table>
                                        <tr>
                                            <th>Nom de l'article</th>
                                            <th>Catégories</th>
                                            <th>Actions</th>
                                        </tr>
                            <?php // Vérifie si $execute est true (ce qui signifie que $result contient des données valides) ?>
                            <?php if ($execute && is_array($result) && count($result) > 0) : ?>
                                <?php foreach ($result as $produit) : ?>
                                
                                <tr>
                                    <td><?php echo htmlspecialchars($produit['p_nom']); ?></td>
                                    <td><?php echo ucfirst(htmlspecialchars($produit['c_nom'])); ?></td>
                                    <td><div class="actions-icons-table"><a href="#"><i class="fa-solid fa-eye"></i></a><a href="#"><i class="fa-solid fa-pen-to-square"></i></a><a href="#"><i class="fa-solid fa-trash"></i></a></div></td>
                                </tr>
                                <?php endforeach;?>
                            <?php else : ?>
                                <?php // Affiche le message d'erreur s'il y en a un, ou un message par défaut si $result est vide ?>
                                <p class="error-message">
                                <?php $msg ? htmlspecialchars($msg) : 'Aucun produit trouvé.';?>
                                </p>
                            <?php endif; ?>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                </section>
            </main>
        </div>
        <?php require "./app/includes/parts/footer.php"?>
        <script src="https://kit.fontawesome.com/eb416f51b7.js" crossorigin="anonymous"></script>
    </body>
</html>