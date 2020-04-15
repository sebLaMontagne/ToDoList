<?php

/*
    Rooter de l'application. Il reçoit 3 paramètres en GET ; un pour le controller a appeler, un pour la méthode du controller, et un pour la langue de l'application.
*/

include_once('Utility/autoloader.php');
// on range une instance de chaque controller de l'application dans la variable $controllers et on appelera le controller dont on a besoin à l'aide du paramètre GET
include_once('Utility/functions.php');
$controllers = controllers_setup();
// on récupère la liste des languages disponibles
include_once('Utility/config.php');

// On controle que l'URL contienne les paramètres controller, action, et lang valides pour executer la méthode appropriée du controller sélectionné
if( isset($_GET['controller']) && array_key_exists($_GET['controller'],$controllers) &&
    isset($_GET['action']) && method_exists($controllers[$_GET['controller']],$_GET['action']) &&
    isset($_GET['lang']) && in_array($_GET['lang'], $AVAILABLE_LANGUAGES))
{
    $controllers[$_GET['controller']]->{$_GET['action']}();
}
// Sinon, on envoie l'utilisateur sur la vue NotFound
else exit(header('Location: '.$ABSOLUTE_URL.'Default/notFound.fr'));