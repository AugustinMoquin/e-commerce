<?php
include("../db_connection.php");

$conn = openCon();


if (isset($_POST['id_produit']) && $_COOKIE["username"] > 0) {

    $var=$_POST['id_produit'];
    $id = $_COOKIE['id'];

    $query_upload = "INSERT INTO panier (id_user, id_product)
    VALUES ('$id', '$var')";
    if ($conn->query($query_upload) === true) {
        $message = "element ajouté au panier";
        header('Location: /e-commerce/php/');

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} 



?>