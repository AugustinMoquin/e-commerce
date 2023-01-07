<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PANIER</title>
</head>
<body>
    <div class="container">
    <?php
        $conn = new PDO('mysql:host=127.0.0.1;dbname=e-commerce', 'root', 'root');

        $id = $_COOKIE['id'];

    
        $requser= $conn->prepare("SELECT * FROM favoris WHERE id_user = ?");
        $requser->execute(array($id));

        $panierUser = $requser->fetch();

        $id_prod = $panierUser['id_product'];
        $id_prod_panier = $panierUser['id'];

        $res = $conn->prepare("SELECT * FROM products WHERE Id = ?");
        $res->execute(array($panierUser['id_product']));

        if ($res->rowCount() > 0) {
            for ($i = 0; $i < $res->rowCount(); $i++) {
                
                $requprod = $conn->prepare("SELECT * FROM products WHERE Id = ?");
                $requprod->execute(array($panierUser['id_product']));   
                
                $row = $res->fetch();


                for ($j = 0; $j < $res->rowCount(); $j++) {
                    echo  "<a class='ind_products' 
                    href='/e-commerce/php/produit/". $row["Id"]."'>
                    <div class='ind_products' name='". $row["Id"]."'>  
                    <img class='img' src='../php". $row["images_path"]."'>
                    <div class='info'> Nom: " . $row["NAME"]. "<br> </div>
                    <div class='info'> Price: " . $row["regular_price"]. " <br> </div>
                    <div class='info'> discount: " . $row["discount_price"]. "<br>  </div>
                    </div> 
                    </a>
                    <form action='/e-commerce/php/panier/delete.php' method='get'>
                    <input type='hidden' name='id' value=" . $id_prod_panier . ">
                    <button type='submit'>Supprimer</button>
                    </form>";
                }
                
            }
        }else {
            echo "vos favoris sont vides";
        }

    ?>
    </div>
    
</body>
</html>