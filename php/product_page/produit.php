<?php
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=e-commerce', 'root', 'root');
    session_start();

    $url = '';

    if (isset($_GET['url'])) {
        $url = explode('/', $_GET['url']);
    }

    if ($url[1]>0) {
    
        $requser= $bdd->prepare('SELECT * FROM products WHERE id = ?');
        $requser->execute(array($url[1]));
        $userinfo = $requser->fetch();
        
    
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../product_page/assets/css/produit.css">
        <title>Document</title>
    </head>
   
    <body class="green-background">

<nav>

<div class="heading">

  <h4 style="" >Kermit & Ci</h4>
  <img src="../images/icons8-monkas-48.png" alt="img" class="logo">


</div>

<ul class="nav-links">

  <li><a href="/e-commerce/php/">Home</a></li>

  <li><a href="/e-commerce/php/contact_us">Compte</a></li>

  <li><a class="active" href="services.html">Favoris</a></li>

  <li><a href="">Panier</a></li>

</ul>

</nav>

    <div class="container_all">
        <div class="product-page">
            <div class="product-header">
                <h1 class="product-title"><?php  echo $userinfo['NAME']; ?></h1>
                <div class="product-image-container">
                    <img src="<?php  echo $userinfo['images_path']; ?>" class = "main-image" alt="Image">
                </div>
            </div>
            <div class="product-section">
                <div class="product-info">
                    
                    <form action='/e-commerce/php/favoris/ajout_favoris.php' method='post' >
                        <input type='hidden' name='id_produit' value='<?php echo $userinfo['Id'] ?>'>
                        <input type='submit' class='add-to-favorite' placeholder='Ajouter aux favoris' class="fav">
                    </form>

                <div class="product-description">Description :
                    <p> </p>
                    <p><?php  echo $userinfo['description']; ?></p>
                </div>


                <div class="product-quantity">
                    <label for="quantity">Quantité :</label>
                    <div class="quantity">
                        <p><?php  echo $userinfo['quantity']; ?></p>
                    </div>
                </div>
                <div class="product-price">
                    <p>Prix : <span class="price"><?php  echo $userinfo['regular_price']; ?> €</span></p>
                </div>

                <form action='/e-commerce/php/panier/ajout_panier.php' method='post'>
                    <input type='hidden' name='id_produit' value='<?php echo $userinfo['Id'] ?>'>
                    <button type='submit' class='add-to-cart' placeholder='Ajouter au panier'>Ajouter au panier</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>

<?php

}else {
    echo "erreur404";
}

?>