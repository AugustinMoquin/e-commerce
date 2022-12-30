<?php
include '../db_user_connection.php';
$conn = openCon();
echo "Connected Successfully";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accueil</title>
</head>
<body>
<div class="products">
             <?php

                $conn = openCon();
                $sql = "SELECT NAME , regular_price , discount_price , images_path FROM products";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                    echo  "<div class='ind_user'>  
                    <div class='info'> Nom: " . $row["NAME"]. "<br> </div>
                    <div class='info'> Price: " . $row["regular_price"]. " <br> </div>
                    <div class='info'> discount: " . $row["discount_price"]. "<br>  </div>
                    <img class='img' src='". $row["images_path"]."'>
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