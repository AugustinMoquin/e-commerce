<?php

$url = '';
$root = "C:/xampp/htdocs/e-commerce/php";

if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

if ($url == "" || $url == "home" || $url == "accueil") {
    require "$root/accueil/accueil.php";
}elseif ($url[0] == "panneau_admin") {
    require "$root/admin_panel/admin_panel.php";
}elseif ($url[0] == "ajout_de_produit") {
    require "$root/ajout_produit/ajout_produit.php";
}elseif ($url[0] == "contact_us") {
    require "$root/contact/contact.php";
}elseif ($url[0] == "produit" && !empty($url[1])) {
    require "$root/product_page/produit.php";
}elseif ($url[0] == "compte") {
    require "$root/login/profil.php";
}else {
    require "$root/accueil/accueil.php";
}





// parse_url() analyse une URL et retourne ses composants
// $parsed_url = parse_url($_SERVER['REQUEST_URI']);

// soit l'url en question a un chemin et sinon le chemin est la racine
// $path = isset($parsed_url['path']) ? $parsed_url['path'] : '/';

// si le chemin est bon alors on fait appel au fichier correspondant
// if ($path == "/e-commerce/php/admin_panel/admin_panel.php")
//     require_once($_SERVER["DOCUMENT_ROOT"] . '/admin_panel');

    






/*** Récupération de la clé de la route ***/

// $origine = str_replace(dirname($_SERVER['PHP_SELF']), '', $_SERVER['REQUEST_URI']);

/*** ROUTES ***/

// $routes = array(

//     "/e-commerce/php/admin_panel/admin_panel" => "/admin_panel",
//     "/ajouter_un_livre" => "livre/ajouter",
//     "/afficher_une_image" => "image/index",
//     "/supprimer_une_image" => "image/supprimer"
// );

/*** Création de l'url de destination ***/

// $destination = (array_key_exists($origine, $routes) ? $routes[$origine] : "../php/accueil/accueil") . '.php';

/*** Appel du bon fichier ***/

// require $destination;

?>