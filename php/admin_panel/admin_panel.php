<?php
require ('db_connection.php');

$Product = "SELECT * FROM products";
$Users = "SELECT * FROM users";
$root = "C:/xampp/htdocs/e-commerce/php";


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
    <header class="main-header">
        <nav>
            <img src="../php/images/icons8-monkas-48.png" alt="img">
            <h1 id="logo">Kermit & Ci
                <form action="" class="search-bar">
                    <input type="text" autocomplete="off" placeholder="Search" name="q">
                    <button type="submit"><img src="../php/images/icons8-chercher-48.png" alt="img"></button>
                </form>
            </h1>
            <ul class="nav-police">
                <li><a href="#">FAVORIS<img src="../php/images/icons8-aimer-50.png" alt="img"></a></li>
                <li><a href="#">COMPTE<img src="../php/images/icons8-kermit-the-frog-48.png" alt="img"></a></li>
                <li><a href="#">PANIER<img src="../php/images/icons8-achats-64.png" alt="img"></a></li>
            </ul>
        </nav>
    </header>
    <body>

    <div class="menu-toggle">
        <ul class="menu-container">
            <li class="option1"><a href="#">TELEPHONE</a>
                <ul class="sous-menu-container1">
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                </ul>
            </li>
            <li class="option2"><a href="#">CONSOLE</a>
                <ul class="sous-menu-container2">
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                </ul>
            </li>
            <li class="option3"><a href="#">JEUX VIDEO</a>
                <ul class="sous-menu-container3">
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                </ul>
            </li>

        </ul>
    </div>

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

        $limitedString = wordwrap($row["description"], 300, "<br>", true);
        $limitedName = wordwrap($row["NAME"], 40, "<br>", true);

        echo "<tr><td> <a href = 'http:8080//localhost/e-commerce/php/product_page/produit.php?&id=" . $row["Id"] . "'> "
          . $row["Id"] . "</td><td>" . $limitedName . "<form action='delete_product.php' method='get'>
          <input type='hidden' name='id' value=" . $row["Id"] . "> <button type='submit'>Supprimer</button>
          </form>";


        echo "</td><td>" . $row["regular_price"] . "</td><td>" . $limitedString;

        echo "</td> </tr>";
      }
      echo "</table>";

    } else {
      // Si non, afficher un message d'erreur
      echo "Aucun résultat trouvé";
    }

    ?>
  </div>

  <div>
    <h2> All Users : </h2>
    <?php
    echo "<form method='post' action='../login/connection.php'>  <button type='submit'>Create a new User</button>
</form>";
    if (mysqli_num_rows($AllUser) > 0) {
      while ($row = mysqli_fetch_assoc($AllUser)) {
        echo "
        <div class='ind_user'>  
        <div name = 'id' class='info'> Id: " . $row["Id"] . "<br> </div>
        <div class='info'> username: " . $row["username"] . " <br> </div>
        <div class='info'> email: " . $row["email"] . "<br>  </div>
        <div class='info'> active: " . $row["active"] . "<br> </div>
        <div class='info'> inserted at: " . $row["inserted_at"] . "<br>  </div>
        <div class='info'> last upadte: " . $row["updated_at"] . "<br> </div>

        <form action='delete_user.php' method='get'>
        <input type='hidden'
        name='id' value=" . $row["Id"] . "> <button type='submit'>Supprimer</button>
        </form>";
        echo "</td></a> </tr> ";
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


<footer>

</footer>

</body>

</html>