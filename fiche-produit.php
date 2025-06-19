<?php
    require_once('./app/settings.php');

    // Déclaration et initalisation des variables
    $msg = null;
    $result = null;
    $execute = false;

    if(!is_object($conn)){       
        $msg = getMessage($conn, 'error');
    }else{
        if(isset($_GET) && !empty($_GET)){
        // Va cherche en DB les articles publiés
        $result = getArticle($conn, $_GET);
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
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gemini Makeup - Fiche Produit</title>
        <link rel="stylesheet" type="text/css" href="./app/assets/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="./app/assets/css/style.css" />
    </head>
    <body>
        <?php require "./app/includes/parts/header.php";?>
        <main>
                <article>
                <div class="produit-visuel">
                    <div class="wrapper wrapper-row">
                        <section>
                            <div class="produit-images">
                                <div class="produit-grande-image">
                                <div class="produit-grande-image">
                                    <?php if (!empty($result[0]['p_photo1'])): ?>
                                    <img src="./app/assets/medias/img/products/<?php echo htmlspecialchars($result[0]['p_photo1']); ?>" alt="<?php echo htmlspecialchars($produit['p_nom']); ?>" width="200" height="200">
                                    <?php else: ?>
                                    <img src="./app/assets/medias/img/products/default.png" alt="Image par défaut" width="450" height="450">
                                    <?php endif; ?>
                                </div>
                                </div>
                                <div class="produit-petites-images">
                                <div class="produit-grande-image">
                                    <?php if (!empty($result[0]['p_photo2'])): ?>
                                    <img src="./app/assets/medias/img/products/<?php echo htmlspecialchars($result[0]['p_photo2']); ?>" alt="<?php echo htmlspecialchars($result[0]['p_nom']); ?>" width="60" height="70">
                                    <?php else: ?>
                                    <img src="./app/assets/medias/img/products/default.png" alt="Image par défaut" width="60" height="70">
                                    <?php endif; ?>
                                </div>
                                <div class="produit-grande-image">
                                    <?php if (!empty($result[0]['p_photo3'])): ?>
                                    <img src="./app/assets/medias/img/products/<?php echo htmlspecialchars($result[0]['p_photo3']); ?>" alt="<?php echo htmlspecialchars($result[0]['p_nom']); ?>" width="60" height="70">
                                    <?php else: ?>
                                    <img src="./app/assets/medias/img/products/default.png" alt="Image par défaut" width="60" height="70">
                                    <?php endif; ?>
                                </div>
                                <div class="produit-grande-image">
                                    <?php if (!empty($result[0]['p_photo4'])): ?>
                                    <img src="./app/assets/medias/img/products/<?php echo htmlspecialchars($result[0]['p_photo4']); ?>" alt="<?php echo htmlspecialchars($result[0]['p_nom']); ?>" width="60" height="70">
                                    <?php else: ?>
                                    <img src="./app/assets/medias/img/products/default.png" alt="Image par défaut" width="60" height="70">
                                    <?php endif; ?>
                                </div>
                                <div class="produit-grande-image">
                                    <?php if (!empty($result[0]['p_photo5'])): ?>
                                    <img src="./app/assets/medias/img/products/<?php echo htmlspecialchars($result[0]['p_photo5']); ?>" alt="<?php echo htmlspecialchars($result[0]['p_nom']); ?>" width="60" height="70">
                                    <?php else: ?>
                                    <img src="./app/assets/medias/img/products/default.png" alt="Image par défaut" width="60" height="70">
                                    <?php endif; ?>
                                </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="produit-description">
                                <div class="produit-titre-description">
                                    <h2><?php echo htmlspecialchars($result[0]['p_nom']); ?></h2>
                                    <p class="itembrand"><?php echo htmlspecialchars($result[0]['p_marque']); ?></p>
                                    <!--<i class="fa-solid fa-star" ></i>-->
                                    <p class="itemdispo-high">Disponibilité</p>
                                </div>
                                <div class="produit-prix-quantite">
                                <p class="itemprice-fiche-produit"><?php echo htmlspecialchars($result[0]['p_prix']); ?></p>
                                    <form class="form-fiche-produit">
                                        <label class=" quantite " for="produit">Quantité :</label>
                                        <select class="quantite-fiche-produit" id="produit" name="produit">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option> 
                                        </select>
                                    </form>
                                </div>
                                <div class="actions-fiche-produit">
                                    <button class="ajout-panier" type="submit">Ajouter au panier</button>
                                    <i class="fa-regular fa-heart fa-heart-fiche-produit" ></i>
                                </div>
                                <div class="produit-rappel">
                                    <div>
                                        <i class="fa-solid fa-truck fa-fiche-produit"></i>
                                        <p>Livraison gratuite à l'achat de min. 45€</p>
                                    </div>
                                    <div>
                                        <i class="fa-regular fa-clock fa-fiche-produit"></i>
                                        <p>Expédition sous 24h</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <section class="fiche-produit-accordeon">
                <div class="wrapper wrapper-accordion">
                    <div class="accordion">
                        <h3 >Description</h3>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <div class="panel">
                    <p><?php echo htmlspecialchars($result[0]['p_description']); ?></p>
                    </div>
                    <div class="accordion">
                        <h3>Conseils d'utilisation</h3>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <div class="panel">
                    <p><?php echo htmlspecialchars($result[0]['p_utilisation']); ?></p>
                    </div>
                    <!--<div class="accordion">
                        <h3 >Avis clients</h3>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <div class="panel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>-->
                </div>
                </section>
                </article>
                <aside >
                    <div class="wrapper recommandations">
                        <h2>Recommandations</h2>
                    <div class="recommandations-container">
                        <article class="recommandations-item">
                            <a href="fiche-produit.php">
                            <div class="itemimage">
                                <img src="./app/assets/medias/img/products/huile-levres.jpg" alt="item" width="200" height="200">
                                <i class="fa-regular fa-heart fa-heart-item" ></i>
                            </div>
                            <div class="itembody">
                                <p class="itembrand">Marque</p>
                                <h3 class="itemtitle">Titre du produit</h3>
                                <p class="itemprice">€10,00</p>
                            </div>
                            </a>
                        </article>

                        <article class="recommandations-item">
                            <a href="fiche-produit.php">
                            <div class="itemimage">
                                <img src="./app/assets/medias/img/products/huile-levres.jpg" alt="item" width="200" height="200">
                                <i class="fa-regular fa-heart fa-heart-item" ></i>
                            </div>
                            <div class="itembody">
                                <p class="itembrand">Marque</p>
                                <h3 class="itemtitle">Titre du produit</h3>
                                <p class="itemprice">€10,00</p>
                            </div>
                            </a>
                        </article>

                        <article class="recommandations-item">
                            <a href="fiche-produit.php">
                            <div class="itemimage">
                                <img src="./app/assets/medias/img/products/huile-levres.jpg" alt="item" width="200" height="200">
                                <i class="fa-regular fa-heart fa-heart-item" ></i>  
                            </div>
                            <div class="itembody">
                                <p class="itembrand">Marque</p>
                                <h3 class="itemtitle">Titre du produit</h3>
                                <p class="itemprice">€10,00</p>
                            </div>
                            </a>
                        </article>
                    </div>
                    </div>
                </aside>
        </main>
        <?php require "./app/includes/parts/footer.php"?>
        <script src="https://kit.fontawesome.com/eb416f51b7.js" crossorigin="anonymous"></script>
        <script src="./app/assets/js/accordion.js"></script>
    </body>
</html>