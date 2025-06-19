<?php
/* ********************************************************************** */
/* *                           DB FUNCTIONS                             * */
/* *                           ------------                             * */
/* *    FONCTIONS RELATIVES AUX INTERACTIONS AVEC LA BASE DE DONNEES    * */
/* ********************************************************************** */

/**
 * Connexion à la base de données
 * 
 * @param string $serverName
 * @param string $userName
 * @param string $userPwd
 * @param string $dbName
 * 
 * @return object $conn
 */

function connectDB($serverName, $userName, $userPwd, $dbName) {
    try {
        // Création d'une connexion à la base de données
        $conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $userName, $userPwd);

        // Définition du mode d'erreur de PDO sur Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $conn;

    } catch (PDOException $e) {
        (DEBUG)? $st = 'Error : ' . $e->getMessage() : $st = "Error : Database connexion";            
        return $st; 
    }
}

/**
 * Récupérer tous les articles de la table articles
 * 
 * @param object $conn 
 * @param string $active (0, 1 ou %)
 * @return array $resultat
 */
function getAllArticlesDB($conn) {
    try {
        // Récupérer des données de notre table articles
        $req = $conn->prepare("SELECT * FROM produits INNER JOIN `categories` ON `c_id` = `p_FK_categorie` ORDER BY p_id ASC");
        //$req->bindParam();
        $req->execute();
    
        // Retourne un tableau associatif pour chaque entrée de la table articles avec le nom des colonnes comme clé
        $resultat = $req->fetchall(PDO::FETCH_ASSOC);

        // Fermeture connexion
        $req = null;
        $conn = null;

        return $resultat;

    } catch (PDOException $e) {
        (DEBUG)? $st = 'Error : ' . $e->getMessage() : $st = "Error in : getAllArticlesDB() function";            
        return $st;  
    }
}

/**
 * Récupérer tous les articles de la table articles avec la condition que ce soit des bestsellers
 * 
 * @param object $conn 
 * @param string $active (0, 1 ou %)
 * @return array $resultat
 */
function getBestsellersDB($conn) {
    try {
        // Récupérer des données de notre table articles
        $req = $conn->prepare("SELECT * FROM `produits` WHERE `p_bestsellers` LIKE 1 AND `p_quantite` > 0 ORDER BY p_id ASC; ");
        //$req->bindParam();
        $req->execute();
    
        // Retourne un tableau associatif pour chaque entrée de la table articles avec le nom des colonnes comme clé
        $resultat = $req->fetchall(PDO::FETCH_ASSOC);

        // Fermeture connexion
        $req = null;
        $conn = null;

        return $resultat;

    } catch (PDOException $e) {
        (DEBUG)? $st = 'Error : ' . $e->getMessage() : $st = "Error in : getAllArticlesDB() function";            
        return $st;  
    }
}


/* Fonction pour avoir les catégories de produits pour les filtres dans la liste des produits
* @param object $conn 
* @param string $active (0, 1 ou %)
* @return array $resultat
*/

function getFiltres($conn){
    try{
        $req = $conn->prepare("SELECT DISTINCT `c_nom`, `c_slug`, `c_id` FROM `produits` INNER JOIN `categories` ON `c_id` = `p_FK_categorie` ORDER BY categories.c_nom ASC; ");
        $req->execute();
        $resultat = $req->fetchall(PDO::FETCH_ASSOC);
        $req = null;
        $conn = null;
        return $resultat;
    } catch (PDOException $e) {
        (DEBUG)? $st = 'Error : ' . $e->getMessage() : $st = "Error in : getFiltres() function";            
        return $st;
    }
}


/*Function pour avoir les marques de produits pour les filtres dans la liste des produits
* @param object $conn 
* @param string $active (0, 1 ou %)
* @return array $resultat
*/

function getMarques($conn){
    try {
        $req = $conn->prepare("SELECT DISTINCT `p_marque` FROM `produits` ORDER BY produits.p_marque ASC; ");
        $req->execute();
        $resultat=$req->fetchall(PDO::FETCH_ASSOC);
        $req = null;
        $conn = null;
        return $resultat;
    } catch (PDOExeception $e){
        (DEBUG)? $st = 'Error : ' . $e->getMessage() : $st = "Error in : getMarques() function";            
        return $st;
    }
}

// TODO: Créer une fonction dans fct-db.php 
// -> Cette fonction doit effectuer une recherche dans la base de données en fonction des paramètres passés
/*Function pour avoir les marques de produits pour les filtres dans la liste des produits
* @param object $conn 
* @param string $active (0, 1 ou %)
* @return array $resultat
*/

function searchDB($conn,$search) {
    try{
        //print_r($search);
        // TODO Initialiser 3 variables et en fonction de si les variables sont présentes dans la requête ou pas, les concaténer dans la requête SQL
        // -> Ici initialiser
        if(isset($search["categories"])){
            $categories_ids = implode(',', $search["categories"]);
        }  
        else{
            $categories = getFiltres($conn);
            foreach($categories as $categorie){
                $categories_ids[] = $categorie['c_id'];
            }
            $categories_ids =  implode(',', $categories_ids);
        }

        //$marques_filtres = implode(',', $search["produits"]);
        

        // -> Ici, modifier la requête SQL avec concaténation

        //Pour les catégories
        $searchFilters = "SELECT * 
        FROM `produits` 
        WHERE `p_FK_categorie` IN ($categories_ids)";
        //Pour les quantités (en stock/pas en stock)
        if(isset($search["enstock"])){
        $searchFilters .= " AND `p_quantite` > 0";}
        

        if(isset($search["marques"])){
            $currentArray = $search["marques"];
            $newArray = array();
            $newArray  = array_map(function($rec){
                //concatenate record with "" 
                $result = $rec= "'".$rec."'";
                return $result;
                },$currentArray);
            $searchFilters .= " AND `p_marque` IN (". implode(',', $newArray) .")";
        }
        
        //Pour l'ordre des produits, dans tous les cas
        $searchFilters .= " ORDER BY produits.p_nom ASC; ";

        $req = $conn->prepare($searchFilters);
        
        
        $req->execute();
        $resultat = $req->fetchall(PDO::FETCH_ASSOC);
        $req = null;
        $conn = null;
        return $resultat;
    } catch (PDOException $e) {
        (DEBUG)? $st = 'Error : ' . $e->getMessage() : $st = "Error in : searchDB() function";            
        return $st;
    }

}

function addArticleDB($conn, $datas){
    try{
     // Préparation des données avant insertion dans la base de données
    $name = filterInputs($datas['name']);
    $slug = filterInputs($datas['slug']);
    $quantitePost = filterInputs($datas['quantite']);
    $prix = filterInputs($datas['prix']);
    $marque = filterInputs($datas['brand']);
    $description = nl2br(filterInputs($datas['description']));
    $conseils = nl2br(filterInputs($datas['conseils']));
    $categoriePost = $datas['categorie'];


 // Insertion des données dans la table articles
     $req = $conn->prepare("INSERT INTO produits (p_nom, p_slug, p_prix, p_quantite, p_marque, p_FK_categorie, p_description,  p_utilisation) VALUES (:p_nom, :p_slug, :p_prix, :p_quantite, :p_marque, :p_FK_categorie, :p_description,  :p_utilisation)");
     $req->bindParam(':p_nom', $name);
     $req->bindParam(':p_slug', $slug);
     $req->bindParam(':p_prix', $prix);
     $req->bindParam(':p_quantite', $quantitePost);
     $req->bindParam(':p_marque', $marque);
     $req->bindParam(':p_description', $description);
     $req->bindParam(':p_utilisation', $conseils);
     $req->bindParam(':p_FK_categorie', $categoriePost);
    // $req->bindParam(':p_photo1', $prix);
     $req->execute();

 // Fermeture connexion
     $req = null;
     $conn = null;

 return true;

}catch(PDOException $e) {
 (DEBUG)? $st = 'Error : ' . $e->getMessage() : $st = "Error in : addArticleDB() function";            
 return $st;  
}       
}

function getArticle($conn, $data) {
    try {
        // Récupérer des données de notre table articles
        $req = $conn->prepare("SELECT * FROM `produits` WHERE `p_id` LIKE :p_id; ");
        $req->bindParam(':p_id', $data['id']);
        $req->execute();
    
        // Retourne un tableau associatif pour chaque entrée de la table articles avec le nom des colonnes comme clé
        $resultat = $req->fetchall(PDO::FETCH_ASSOC);

        // Fermeture connexion
        $req = null;
        $conn = null;

        return $resultat;

    } catch (PDOException $e) {
        (DEBUG)? $st = 'Error : ' . $e->getMessage() : $st = "Error in : getArticle() function";            
        return $st;  
    }
}