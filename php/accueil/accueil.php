<?php
include 'db_connection.php';
$conn = openCon();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../php/accueil/assets/css/accueil_style.css">
    <title>accueil</title>
</head>
<body>

<nav>

<div class="heading">

  <h4 style="" >Kermit & Ci</h4>
  <img src="../php/images/icons8-monkas-48.png" alt="img" class="logo">


</div>

<ul class="nav-links">

  <li><a href="/e-commerce/php/">Home</a></li>

  <li><a href="/e-commerce/php/compte">Compte</a></li>

  <li><a class="active" href="/e-commerce/php/favoris_user">Favoris</a></li>

  <li><a href="/e-commerce/php/panier_user">Panier</a></li>

</ul>

</nav>


<div class="products" >
             <?php

                $sql = "SELECT NAME , regular_price , discount_price , images_path, Id FROM products";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                    echo  "<a class='ind_products' 
                    href='/e-commerce/php/produit/". $row["Id"]."'>
                    <div class='ind_products' name='". $row["Id"]."'>  
                    <img class='img' src='../php". $row["images_path"]."'>
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

<footer>
<a href="/e-commerce/php/contact_us">Nous contacter</a>

</footer>

</html>

<?php
CloseCon($conn);
?>