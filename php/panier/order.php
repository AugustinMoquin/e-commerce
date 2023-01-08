<?php
include("../db_connection.php");
$conn = openCon();









$IdProduct = $_GET["id"];
echo $IdProduct;

$sql = "DELETE FROM panier WHERE id = '$IdProduct'";
$result = $conn->query($sql);

if ($conn->query($sql) === true) {
    echo "Product deleted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: http://localhost:8080/e-commerce/php/panier_user');


?>