<?php
    require_once('./app/settings.php');

    // Déclaration et initalisation des variables
    $msg = null;
    $result = null;
    $execute = false;

    if(!is_object($conn)){       
        $msg = getMessage($conn, 'error');
    }else{
        if(isset($_POST) && !empty($_POST)){
        // Va cherche en DB les articles publiés
        $result = addArticleDB($conn, $_POST);
        }
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
        <title>Gemini Makeup - Admin - Ajouter un article</title>
        <link rel="stylesheet" type="text/css" href="./app/assets/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="./app/assets/css/style.css">
    </head>
    <body>
    <?php require "./app/includes/parts/admin-header.php";?>
    <div class="admin-body">
        <?php require "./app/includes/parts/admin-nav-secondary.php";?>
            <main>
                <section id="admin-add-article">
                    <div class="wrapper admin-add-article">
                        <h1>Ajouter un article</h1>
                        <div class="admin-add-article-form">
                            <form action="#" method="post">
                                <div>
                                <label for="name">Nom</label>
                                    <div>
                                        <input type="text" id="name" name="name" placeholder="Nom de l'article"><br>
                                        <p>Le nom est la façon dont il apparaît sur votre site.</p>
                                    </div>
                                </div>
                                <div>
                                <label for="slug">Slug</label>
                                    <div>
                                        <input type="text" id="slug" name="slug" placeholder="Slug"><br>
                                        <p>Le «slug» est la version du nom normalisée pour les URL.<br> Il ne contient généralement que des lettres, des chiffres, et des traits d'union.</p>
                                    </div>
                                </div>
                                <div>
                                <label for="categorie">Catégorie parente</label>
                                    <div>
                                        <select id="categorie" name="categorie">
                                            <option value="1" selected>Teint</option>
                                            <option value="3">Blush</option>
                                            <option value="4">Highlighter</option>
                                            <option value="5">Bronzer</option>
                                            <option value="6">Fards à paupières</option>
                                            <option value="7">Eyeliner</option>
                                            <option value="8">Mascara</option>
                                            <option value="9">Sourcils</option>
                                            <option value="10">Lèvres</option>
                                        </select><br>
                                    <p>Les catégories, contrairement aux étiquettes, peuvent avoir une hiérarchie.Vous pouvez avoir une catégorie nommée Jazz, à l'intérieur, plusieurs catégories comme Bebop, et Big Band.<br> Ceci est totalement facultatif.</p>
                                    </div>
                                </div>
                                <div>
                                <label for="quantite">Quantité</label>
                                <input type="number" id="quantite" name="quantite" min="0" placeholder="Quantité"><br>
                                </div>
                                <div>
                                <label for="prix">Prix</label>
                                <input type="number" id="prix" name="prix" min="0" placeholder="Prix"><br>
                                </div>
                                <div>
                                <label for="brand">Marque</label>
                                <input type="text" id="brand" name="brand" placeholder="Marque"><br>
                                </div>
                                <div>
                                <label for="description">Description</label>
                                <textarea class="textarea-form" id="description" name="description" rows="10" cols="50">Description</textarea><br>
                                </div>
                                <div>
                                <label for="conseils">Conseils d'utilisation</label>
                                <textarea class="textarea-form" id="conseils" name="conseils" rows="10" cols="50">Conseils d'utilisation</textarea> <br>
                                </div>
                                <div>
                                <label for="photos">Photos</label>
                                <input type="file" id="photos" name="photos" accept="image/png, image/jpeg" multiple/><br>
                                </div>
                                <div class="submit-buttons">
                                <input type="submit" value="Ajouter">
                                <input type="button" value="Supprimer">
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </main>
        </div>
        <?php require "./app/includes/parts/footer.php"?>
        <script src="https://kit.fontawesome.com/eb416f51b7.js" crossorigin="anonymous"></script>
    </body>
</html>