<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../php/panier/assets/panier.css">
    <title>PANIER</title>
</head>
<body>
    <div class="container">
    <?php
        $conn = new PDO('mysql:host=127.0.0.1;dbname=e-commerce', 'root', 'root');

        $id = $_COOKIE['id'];

    
        $requser= $conn->prepare("SELECT * FROM panier WHERE id_user = ?");
        $requser->execute(array($id));


        while ($panierUser = $requser->fetch()) {
                $id_prod = $panierUser['id_product'];
                $id_prod_panier = $panierUser['id'];
                
                $res = $conn->prepare("SELECT * FROM products WHERE Id = ?");
                $res->execute(array($panierUser['id_product']));
                
                if ($res->rowCount() > 0) {
                    for ($i = 0; $i < $res->rowCount(); $i++) {
                        

                        $requprod = $conn->prepare("SELECT * FROM products WHERE Id = ?");
                        $requprod->execute(array($panierUser['id_product']));          

                        $sql = "SELECT * FROM products WHERE Id = '$id_prod'";
                        $result = $conn->query($sql);

                        $row = $res->fetch();

                        if ($res->rowCount() > 0) {
                            for ($j = 0; $j < $res->rowCount(); $j++) {
                                echo  "
                                <div class='ind_products' name='". $row["Id"]."'> 
                                <a class='ind_product' 
                                href='/e-commerce/php/produit/". $row["Id"]."'>
                                <div class='image'>
                                <img class='img' src='../php". $row["images_path"]."'>
                                </div> 
                                <div class='info'>
                                <div class='info'> Nom: " . $row["NAME"]. "<br> </div>
                                <div class='info'> Price: " . $row["regular_price"]. " <br> </div>
                                <div class='info'> discount: " . $row["discount_price"]. "<br>  </div>
                                </div>
                                </a>
                                <form action='/e-commerce/php/panier/delete.php' method='get'>
                                <input type='hidden' name='id' value=" . $id_prod_panier . ">
                                <button type='submit'>Supprimer</button>
                                </form>
                                </div> ";
                            }
                        }
                    }
                }
                echo "<button class='commande' href='/e-commerce/php/panier/order.php'></button>";
            }
        
         
    ?>
    </div>
    
</body>
</html>