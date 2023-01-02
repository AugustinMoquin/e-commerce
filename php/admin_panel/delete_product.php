<?php
include("../db_connection.php");
$conn = openCon();

$IdProduct = $_GET["id"];
echo $IdProduct;

$sql = "DELETE FROM products WHERE Id = $IdProduct;";
$result = $conn->query($sql);

if ($conn->query($sql) === true) {
    echo "Product deleted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: http://localhost:8080/e-commerce/php/admin_panel/admin_panel.php');



?>