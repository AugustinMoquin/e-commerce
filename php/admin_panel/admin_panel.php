<?php 
include ("../db_connection.php");;

$Product = "SELECT * FROM products";
$Users =  "SELECT * FROM users";

$conn = openCon();


$result = mysqli_query($conn, $Product);
$AllUser = mysqli_query($conn, $Users);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin_panel/assets/admin_panel_style.css">
    <title>Document</title>
</head>
<body>

  <header>

  </header>

<div>
    <h2> All Product :</h2>
<?php

echo "<form method='post' action='../ajout_produit/ajout_produit.php'> 
  <button type='submit'>Create a new product</button>
  </form>";
if (mysqli_num_rows($result) > 0) {
    // Si oui, afficher les données dans une table HTML
    echo "<table style='text-align: center;'>";
    echo "<tr><th>ID</th><th>Nom</th><th>Prix</th><th> Description </th> </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        // $row["Description"].
        $limitedString = wordwrap($row["description"],300,"<br>",true);  // Permet de découper les description trop longue pour ne pas déformer la page
        $limitedName = wordwrap($row["NAME"],40,"<br>",true);

        echo "<tr><td> <a href = 'http://localhost/e-commerce/php/product_page/produit.php?&id=". $row["Id"]."'> "
          . $row["Id"]. "</td><td>" . $limitedName;
        echo    "<form method='post' action='../php/DeleteProduct.php'> <input type='hidden' name='id' value=".$row["Id"]."> 
          <button type='submit'>Supprimer</button>
        </form>";
        echo "</td><td>" . $row["regular_price"]. "</td><td>". $limitedString ;
        
        echo "</td> </tr>";
    }
    echo "</table>";       

} else {
    // Si non, afficher un message d'erreur
    echo "Aucun résultat trouvé";
}

?>
</div>

<div > 
    <h2> All Users : </h2>
<?php
echo "<form method='post' action='../php/product.php'>  <button type='submit'>Create a new User</button>
</form>";
    if (mysqli_num_rows($AllUser) > 0) {
    // Si oui, afficher les données dans une table HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th> Gender </th><th> Age </th> <th>  </th></tr>";
    while ($row = mysqli_fetch_assoc($AllUser)) {
      echo  "<div class='ind_user'>  
        <div class='info'> Id: " . $row["Id"]. "<br> </div>
        <div class='info'> username: " . $row["username"]. " <br> </div>
        <div class='info'> email: " . $row["email"]. "<br>  </div>
        <div class='info'> active: " . $row["active"]. "<br> </div>
        <div class='info'> inserted at: " . $row["inserted_at"]. "<br>  </div>
        <div class='info'> last upadte: " . $row["updated_at"]. "<br> </div>
        <form action='delete_user.php' method='post'>
        <div value=". $row["Id"]." name='IdValue'></div>
        <input type='button' value='supprimer'></form>
        </div>" ; 
        
      echo    "<form method='post' action='../php/DeleteUser.php'> <input type='hidden'
       name='id' value=".$row["Id"]."> <button type='submit'>Supprimer</button>
      </form>";
        echo"</td></a> </tr> ";
    }
    echo "</table>";       

} else {
    // Si non, afficher un message d'erreur
    echo "Aucun résultat trouvé";
}
?>
</div>


</body>
</html>









    
<div class="users">
             <?php
                include ("../db_connection.php");

                $conn = openCon();
                $sql = "SELECT username , email , Id , active , inserted_at , updated_at FROM users";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                    echo  "<div class='ind_user'>  
                    <div class='info'> Id: " . $row["Id"]. "<br> </div>
                    <div class='info'> username: " . $row["username"]. " <br> </div>
                    <div class='info'> email: " . $row["email"]. "<br>  </div>
                    <div class='info'> active: " . $row["active"]. "<br> </div>
                    <div class='info'> inserted at: " . $row["inserted_at"]. "<br>  </div>
                    <div class='info'> last upadte: " . $row["updated_at"]. "<br> </div>
                    <form action='delete_user.php' method='post'>
                    <div value=". $row["Id"]." name='IdValue'></div>
                    <input type='button' value='supprimer'></form>
                    </div>" ;
                  }
                } else {
                  echo "0 results";
                }
                $conn->close();
            ?>
    </div>
    

  <footer>

  </footer>

</body>
</html>


