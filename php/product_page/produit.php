<?php
    
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=e-commerce','root','root');
    session_start();
    if(isset($_GET['id']) AND $_GET['id'] >0 )
    {
        $getid = intval($_GET['id']);
        $requser= $bdd->prepare('SELECT * FROM products WHERE id = ?');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
        
    
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../ajout_produit/assets/css/produit.css">
        <title>Document</title>
    </head>
   
    <body class="green-background">
    <div class="container_all">
            <div class="product-page">
        <div class="product-header">
            <h1 class="product-title"><?php  echo $userinfo['NAME']; ?></h1>
        </div>
        <div class="product-section">
            <div class="product-image-container">
                <img src="<?php  echo $userinfo['images_path']; ?>" class = "main-image" alt="Image">
            </div>
            <div class="product-info">
            <div class="product-description">description
                <p><?php  echo $userinfo['description']; ?></p>
            </div>
            <div class="product-quantity">
                <label for="quantity">Quantité :</label>
                <div class="quantity">
                    <p><?php  echo $userinfo['quantity']; ?></p>
                </div>
            </div>
            <div class="product-price">
                <p>Prix : <span class="price"><?php  echo $userinfo['regular_price']; ?></span></p>
            </div>
            <button class="add-to-cart">Ajouter au panier</button>
            </div>
        </div>
        </div>
    </div>
    </body>
</html>

<?php
}
else{
    echo "erreur" ;

}
?>