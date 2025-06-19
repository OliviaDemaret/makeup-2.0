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
        $filtres = getFiltres($conn);
        $marques = getMarques($conn);
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
        <title>Gemini Makeup - Liste Produits</title>
        <link rel="stylesheet" type="text/css" href="./app/assets/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="./app/assets/css/style.css" />
    </head>
    <body>
        <?php require "./app/includes/parts/header.php";?>
        <main>
            <h2 class="liste-produits-title">Produits</h2>
                <div class="wrapper wrapper-liste-produits">
                    <section id="filtres">
                        <aside>
                        <h3>Filtres</h3>
                            <form action="search.php" method="get">
                            <div class="submit-filters">
                                    <button class="submit-filters-btn" type="submit">Filtrer</button>
                            </div>
                            <h4>Catégories</h4>
                            <?php
                        // Vérifie si $execute est true (ce qui signifie que $result contient des données valides)
                        if ($execute && is_array($filtres) && count($filtres) > 0) {
                            foreach ($filtres as $filtre) {
                            
                                require "./app/includes/cards/form-categories.php";  
                            }
                        } else {
                            // Affiche le message d'erreur s'il y en a un, ou un message par défaut si $result est vide
                            echo '<p class="error-message">';
                            echo $msg ? htmlspecialchars($msg) : 'Aucun produit trouvé.';
                            echo '</p>';
                        }
                    ?>
                        
                                <h4>Disponibilité</h4>
                                <div>
                                    <input type="checkbox" id="enstock" name="enstock" value="enstock" />
                                    <label for="enstock">En stock</label>
                                </div>
                                <!--<h4>Prix</h4>
                                <input type="text" id="min" name="min" placeholder="€0,00" >
                                <p> à </p>
                                <input type="text" id="max" name="max" placeholder="€100,00">-->
                                <h4>Marques</h4>
                                <?php
                                // Vérifie si $execute est true (ce qui signifie que $result contient des données valides)
                                if ($execute && is_array($marques) && count($marques) > 0) {
                                    $cpt_marque = 0;
                                    
                                    foreach ($marques as $marque) {
                                    
                                        require "./app/includes/cards/form-marques.php";  
                                        $cpt_marque++;
                                    }
                                } else {
                                    // Affiche le message d'erreur s'il y en a un, ou un message par défaut si $result est vide
                                    echo '<p class="error-message">';
                                    echo $msg ? htmlspecialchars($msg) : 'Aucun produit trouvé.';
                                    echo '</p>';
                                }
                            ?>
                        
                            </form>
                        </aside>
                    </section>
                    <section id="grille-produits" >
                    <?php
                        // Vérifie si $execute est true (ce qui signifie que $result contient des données valides)
                        if ($execute && is_array($result) && count($result) > 0) {
                            foreach ($result as $produit) {
                            
                                require "./app/includes/cards/article.php";  
                            }
                        } else {
                            // Affiche le message d'erreur s'il y en a un, ou un message par défaut si $result est vide
                            echo '<p class="error-message">';
                            echo $msg ? htmlspecialchars($msg) : 'Aucun produit trouvé.';
                            echo '</p>';
                        }
                    ?>
                </section>
            </div>
        </main>
        <?php require "./app/includes/parts/footer.php"?>
        <script src="https://kit.fontawesome.com/eb416f51b7.js" crossorigin="anonymous"></script>
    </body>
</html>