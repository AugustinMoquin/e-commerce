<?php

// parse_url() analyse une URL et retourne ses composants
$parsed_url = parse_url($_SERVER['REQUEST_URI']);

// soit l'url en question a un chemin et sinon le chemin est la racine
$path = isset($parsed_url['path']) ? $parsed_url['path'] : '/';

// si le chemin est bon alors on fait appel au fichier correspondant
if ($path == "/e-commerce/php/admin_panel/admin_panel.php")
    require_once($_SERVER["DOCUMENT_ROOT"] . '/admin_panel');





/*** Récupération de la clé de la route ***/

// $origine = str_replace(dirname($_SERVER['PHP_SELF']), '', $_SERVER['REQUEST_URI']);

/*** ROUTES ***/

// $routes = array(

//     "/e-commerce/php/admin_panel/" => "/admin_panel",
//     "/ajouter_un_livre" => "livre/ajouter",
//     "/afficher_une_image" => "image/index",
//     "/supprimer_une_image" => "image/supprimer"
// );

/*** Création de l'url de destination ***/

// $destination = (array_key_exists($origine, $routes) ? $routes[$origine] : "../php/accueil/accueil") . '.php';

/*** Appel du bon fichier ***/

// require $destination;

?>