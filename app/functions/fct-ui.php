<?php

/* ********************************************************************** */
/* *                          TOOLS FUNCTIONS                           * */
/* *                          ---------------                           * */
/* *        FONCTIONS D'AFFICHAGE DE L'INTERFACE UTILISATEUR            * */
/* ********************************************************************** */



function getMessage($message, $type = 'success')
{
    $html = '<div class="msg-'.$type.'">'.$message.'</div>';
    return $html;
}