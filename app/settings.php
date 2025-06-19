<?php
    // Constante d'activation/désactivation du mode DEBUG
    const DEBUG = true;

    // Charge les credentials de connexion à la DB
    require_once('conf/conf-db.php');

    // Lancement de la session
    session_start();
    
    // Chargement des fichiers de fonctions
    require_once('app/functions/fct-db.php');
    require_once('app/functions/fct-ui.php');
    require_once('app/functions/fct-tools.php');

    // Instancier un objet de connexion
    $conn = connectDB(SERVER_NAME, USER_NAME, USER_PWD, DB_NAME);
