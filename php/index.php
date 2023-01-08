
<style>
    .heading {
    display: flex;
    flex-direction: row-reverse;
    align-items: center;
}

* {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}

.body-text {
    display: flex;
    font-family: "Montserrat", sans-serif;
    align-items: center;
    justify-content: center;
    margin-top: 250px;
}

nav {
    display: flex;
    justify-content: space-around;
    align-items: center;
    min-height: 8vh;
    background-color: teal;
    font-family: "Montserrat", sans-serif;
}

.heading {
    color: white;
    text-transform: uppercase;
    letter-spacing: 5px;
    font-size: 20px;
}

.nav-links {
    display: flex;
    justify-content: space-around;
    width: 30%;
}

.nav-links li {
    list-style: none;
}

.nav-links a {
    color: white;
    text-decoration: none;
    letter-spacing: 3px;
    font-weight: bold;
    font-size: 14px;
    padding: 14px 16px;
}

.nav-links a:hover:not(.active) {
    background-color: lightseagreen;
}

.nav-links li a.active {
    background-color: #4caf50;
}
</style>

<nav>

<div class="heading">

  <h4 style="" >Kermit & Ci</h4>
  <img src="../php/images/icons8-monkas-48.png" alt="img" class="logo">


</div>

<ul class="nav-links">

    <li><a href="/e-commerce/php/">Home</a></li>

    <?php 
    if (isset($_COOKIE['id'])) {
      $id = $_COOKIE['id'];
    ?>
    <li><a href="/e-commerce/php/compte">Compte</a></li>

    <li><a class="active" href="/e-commerce/php/favoris_user">Favoris</a></li>

    <li><a href="/e-commerce/php/panier_user">Panier</a></li>

    <?php
      if ($id == 7) {
    ?>


    <li><a href="/e-commerce/php/panneau_admin/">Admin</a></li>

    <li><a href="/e-commerce/php/ajout_de_produit/">Ajout</a></li>


    <?php 
      }
    }else {

    ?>

    <li><a class="active"  href="/e-commerce/php/register-login/">Connectez vous</a></li>


    <?php
    }
    ?>

</ul>

</nav>



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
}elseif ($url[0] == "register-login") {
    require "$root/login/connection.php";
}elseif ($url[0] == "panier_user") {
    require "$root/panier/panier_user.php";
}elseif ($url[0] == "favoris_user") {
    require "$root/favoris/favoris.php";
}else {
    require "$root/accueil/accueil.php";
}
?>

    


