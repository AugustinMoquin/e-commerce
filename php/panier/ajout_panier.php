<?php
include("../db_connection.php");

$conn = openCon();

if (isset($_POST['id_produit'])) {
    $var=$_POST['id_produit'];


    $query_upload = "INSERT INTO panier (id, id_user, id_product)
    VALUES ('$var', '$name', '$price', )";
    if ($conn->query($query_upload) === true) {
        $message = "element ajouté au panier";
        header('Location: /e-commerce/php/ajout_de_produit/');

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} 



?>