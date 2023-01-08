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

<style>
  .products{
    display:flex;
    flex-direction:column;
    left: 10%;
  }

  .ind_products{
    display:flex;
    gap:05rem;
    width:60vw;
    top:1rem;
    background-color:snow;
  }

</style>


<div class="products" >
             <?php

                $sql = "SELECT NAME , regular_price , discount_price , images_path, Id, description FROM products";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                    echo  "
                    <div class='container_prod'>
                    <div class='ind_products'>  
                      <a 
                        href='/e-commerce/php/produit/". $row["Id"]."'>
                        <div class='ind_products' name='". $row["Id"]."'> 
                          <div class='image'>
                            <img class='img' src='../php". $row["images_path"]."'>
                          </div> 
                          <div class='info'>
                            <div class='info'> Name: " . $row["NAME"]. "<br> </div>
                      </a>
                            <div class='info'> Price: " . $row["regular_price"]. "€ <br> </div>
                            <div class='info'> discount: " . $row["discount_price"]. " %<br>  </div>
                            <div class='info'> description: " . $row["description"]. " <br>  </div>
                          </div>
                        </div> 
                    </div>
                    </div>" ;
                    
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