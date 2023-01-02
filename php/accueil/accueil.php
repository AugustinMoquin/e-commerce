<?php
include '../db_connection.php';
$conn = openCon();
echo "Connected Successfully";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../accueil/assets/css/accueil_style.css">
    <title>accueil</title>
</head>
<body>
<div class="products" >
             <?php

                $sql = "SELECT NAME , regular_price , discount_price , images_path, Id FROM products";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                    echo  "<a class='ind_products' 
                    href='http://localhost/e-commerce/php/product_page/produit.php?&id=". $row["Id"]."'>
                    <div class='ind_products' name='". $row["Id"]."'>  
                    <img class='img' src='". $row["images_path"]."'>
                    <div class='info'> Nom: " . $row["NAME"]. "<br> </div>
                    <div class='info'> Price: " . $row["regular_price"]. " <br> </div>
                    <div class='info'> discount: " . $row["discount_price"]. "<br>  </div>
                    </div> 
                    </a>" ;
                    
                  }
                } else {
                  echo "0 results";
                }
            ?>
    </div>
</body>
</html>

<?php
CloseCon($conn);
?>