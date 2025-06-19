<?php
/* ********************************************************************** */
/* *                          TOOLS FUNCTIONS                           * */
/* *                          ---------------                           * */
/* *              FONCTIONS GENERIQUES : DE TYPE OUTILS                 * */
/* ********************************************************************** */

/**
 * Préparation des données avant insertion dans la base de données
 * 
 * 
 * @param mixed $datas 
 * @return string 
 */
function filterInputs($datas, $checked = true) {

    // Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
    $datas = trim($datas);
    // Supprime les antislashs d'une chaîne
    $datas = stripslashes($datas);
    // Convertit les caractères spéciaux en entités HTML
    $datas = htmlentities($datas);  

    if($checked){
    // Supprime les balises HTML et PHP d'une chaîne
    $datas = strip_tags($datas);
    }
    return $datas;
}