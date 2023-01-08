<?php
include("db_connection.php");
$conn = openCon();

$IdProduct = $_POST["id"];
echo $IdProduct;

$sql = "DELETE FROM products WHERE Id = $IdProduct;";
$result = $conn->query($sql);

if ($conn->query($sql) === true) {
    echo "Product deleted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: /e-commerce/php/panneau_admin');



?>