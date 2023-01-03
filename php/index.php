<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../php/accueil/assets/css/Home.css">
    <title>Document</title>
</head>
<body>
    <header class="main-header">
        <nav>
            <img src="../php/images/icons8-monkas-48.png">
            <h1 id="logo">Kermit & Co
                <form action="" class="search-bar">
                    <input type="text" autocomplete="off" placeholder="Search" name="q">
                    <button type="submit"><img src="../php/images/icons8-chercher-48.png"></button>
                </form>
            </h1>
            <ul class="nav-police">
                <li><a href="#">FAVORIS<img src="../php/images/icons8-aimer-50.png"></a></li>
                <li><a href="#">COMPTE<img src="../php/images/icons8-kermit-the-frog-48.png"></a></li>
                <li><a href="#">PANIER<img src="../php/images/icons8-achats-64.png"></a></li>
            </ul>
        </nav>
    </header>
    <body>

    <div class="menu-toggle">
        <ul class="menu-container">
            <li class="option1"><a href="#">TELEPHONE</a>
                <ul class="sous-menu-container1">
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                </ul>
            </li>
            <li class="option2"><a href="#">CONSOLE</a>
                <ul class="sous-menu-container2">
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                </ul>
            </li>
            <li class="option3"><a href="#">JEUX VIDEO</a>
                <ul class="sous-menu-container3">
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                </ul>
            </li>

        </ul>
    </div>
    
</body>
</html>


<?php

$url = '';
$root = "C:/xampp/htdocs/e-commerce/php";

if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

if ($url == "") {
    require "$root/accueil/home.html";
}elseif ($url[0] == "panneau_admin") {
    require "$root/admin_panel/admin_panel.php";
}elseif ($url[0] == "ajout_produit") {
    require "$root/ajout_produit/ajout_produit.php";
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