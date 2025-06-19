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
        $result = getBestsellersDB($conn);

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
        <title>Gemini Makeup - Accueil</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
        <link rel="stylesheet" type="text/css" href="./app/assets/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="./app/assets/css/style.css">
    </head>
    <body>
        <?php require "./app/includes/parts/header.php";?>
        <main>
            <section id="presentation">
                <div class="wrapper presentation">
                    <h1>Gemini Makeup</h1>
                    <p>Découvre ta nouvelle obsession !</p>
                </div>
            </section>
            <section id="presentation-grid">
                <div class="wrapper presentation-grid">
                    <div class="container-col1">
                    <div class="container container-nouveautes">
                        <div class="overlay overlay-nouveautes">
                            <div class="overlay-text overlay-text-nouveautes">
                            <h3>Nouveautés</h3>
                            <p>Infos nouveautés</p>
                            </div>
                            <a class="eye-vignette" href="./under-construction-page.php"><i class="fa-regular fa-eye fa-eye-index"></i></a>
                        </div>
                    </div>
                    </div>
                    <div class="container-col2">
                        <div class="container-row1">
                            <div class="container container-eponges">
                                <div class="overlay overlay-eponges">
                                    <div class="overlay-text overlay-text-eponges">
                                        <h3>Eponges</h3>
                                        <p>Infos bundle</p>
                                    </div>
                                    <a class="eye-vignette" href="./under-construction-page.php"><i class="fa-regular fa-eye fa-eye-index"></i></a>
                                </div>
                            </div>
                            <div class="container container-pinceaux">
                                <div class="overlay overlay-pinceaux">
                                    <div class="overlay-text overlay-text-pinceaux">
                                    <h3>Pinceaux</h3>
                                    <p>Infos bundle</p>
                                    </div>
                                    <a class="eye-vignette" href="./under-construction-page.php"><i class="fa-regular fa-eye fa-eye-index"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="container container-row2 container-mascaras">
                            <div class="overlay overlay-mascaras overlay-musthaves">
                                <span>Musthaves !</span>
                                <a class="eye-vignette" href="./under-construction-page.php"><i class="fa-regular fa-eye fa-eye-index"></i></a>
                            </div>
                        </div>
                    </div>  
                </div>
            </section>
            <section id="bestsellers">
                <div class="wrapper bestsellers">
                    <h2>Bestsellers</h2>
                    <!--slider (mettre une balise article pour chaque carte) -->
                    <div class="swiper swiper-bestsellers">
                        <div class="swiper-wrapper swiper-wrapper-bestsellers">
                        <?php
                        // Vérifie si $execute est true (ce qui signifie que $result contient des données valides)
                        if ($execute && is_array($result) && count($result) > 0) {
                            foreach ($result as $produit) {
                            
                                require "./app/includes/cards/article-bestsellers.php";  
                            }
                        } else {
                            // Affiche le message d'erreur s'il y en a un, ou un message par défaut si $result est vide
                            echo '<p class="error-message">';
                            echo $msg ? htmlspecialchars($msg) : 'Aucun produit trouvé.';
                            echo '</p>';
                        }
                    ?>                           
                        </div>
                        <div class="swiper-pagination swiper-pagination-bestsellers"></div>
                        <div class="swiper-button-prev swiper-button-prev-bestsellers"></div>
                        <div class="swiper-button-next swiper-button-next-bestsellers"></div> 
                    </div>
                </div>
            </section>
            <section id="promotions">
                <div class="wrapper promotions">
                    <div class="promotion promotion-palette">
                        <img src="./app/assets/medias/img/templates/palette-promotion.jpg" alt="Promotion 1" width="400">
                        <div class="promotion-text promotion-text-palette">
                            <h3>Palette de fards à paupière</h3>
                            <p>✨ Libérez votre créativité avec notre magnifique Palette de Fards à Paupières ! Des teintes vives et audacieuses aux neutres doux et sensuels, cette palette a tout ce qu'il vous faut pour créer des looks infinis. 🌈 Profitez de 15% de réduction sur votre achat pendant une durée limitée. Parfaite pour un maquillage quotidien ou pour des occasions spéciales—procurez-vous la vôtre dès aujourd'hui et sublimez votre regard !</p>
                        </div>
                    </div>
                    <div class="promotion">
                    <img src="./app/assets/medias/img/templates/gloss-promotion.jpg" alt="Promotion 2" width="400">
                        <div class="promotion-text promotion-text-gloss">
                            <h3>Gloss à lèvres</h3>
                            <p>💋 La perfection du maquillage commence ici ! Nos Gloss à Lèvres offrent une brillance éclatante et une touche de couleur. Que vous recherchiez une brillance subtile ou un look glamour, notre collection a ce qu'il vous faut. 💖 Achetez maintenant et bénéficiez de 20% de réduction sur tous nos gloss à lèvres. Ne manquez pas cette offre—vos lèvres le méritent !</p>
                        </div>
                    </div>
                </div>
            </section>
            <section id="marques">
                <div class="wrapper marques">
                    <h2>Marques</h2>
                    <div class="swiper swiper-brands">
                        <div class="swiper-wrapper swiper-wrapper-brands">
                            <div class="swiper-slide swiper-slide-brands">
                                <a href="#">
                                    <img src="./app/assets/medias/img/marques/nars.png" alt="nars" width="200" height="100">
                                </a>
                            </div>

                            <div class="swiper-slide swiper-slide-brands">
                                <a href="#">
                                    <img src="./app/assets/medias/img/marques/maybelline.png" alt="maybelline" width="200" height="100">
                                </a>
                            </div>
                            <div class="swiper-slide swiper-slide-brands">
                                <a href="#">
                                    <img src="./app/assets/medias/img/marques/mac.png" alt="mac" width="200" height="100">
                                </a>
                            </div>

                            <div class="swiper-slide swiper-slide-brands">
                                <a href="#">
                                    <img src="./app/assets/medias/img/marques/loreal.png" alt="loreal" width="180" height="130">
                                </a>
                            </div>

                            <div class="swiper-slide swiper-slide-brands">
                                <a href="#">
                                    <img src="./app/assets/medias/img/marques/dior.png" alt="brand" width="200" height="100">
                                </a>
                            </div>
                            <div class="swiper-slide swiper-slide-brands">
                                <a href="#">
                                    <img src="./app/assets/medias/img/marques/anastasia-beverly-hills.png" alt="brand" width="200" height="100">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-brands"></div>
                        <div class="swiper-button-prev swiper-button-prev-brands"></div>
                        <div class="swiper-button-next swiper-button-next-brands"></div>
                    </div>
                </div>
            </section>
            <section id="newsletter">
                <div class="wrapper newsletter">
                    <h2>Newsletter</h2>
                    <p class="newsletter-text">Ne manquez jamais une promotion et recevez gratuitement les dernières  nouvelles,<br> réductions et bien plus encore dans votre boîte de  réception !</p>
                    <div class="inscription-newsletter-container">
                        <form method="post">
                            <input type="text" class="inscription-newsletter" placeholder="E-mail address" name="Adresse mail">
                            <button class="inscription-newsletter-button" type="submit">Inscription</button>
                        </form>
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

