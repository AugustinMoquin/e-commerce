<?php
include("../db_connection.php");

$conn = openCon();


if (isset($_POST['id_produit']) && $_COOKIE["username"] > 0) {

    $var=$_POST['id_produit'];
    $id = $_COOKIE['id'];

    $query_upload = "INSERT INTO favoris (id_user, id_produit)
    VALUES ('$id', '$var')";
    if ($conn->query($query_upload) === true) {
        $message = "element ajouté aux favoris";
        header('Location: /e-commerce/php/compte');

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} 



?>