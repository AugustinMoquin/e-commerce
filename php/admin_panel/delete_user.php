<?php
include("../db_connection.php");
$conn = openCon();

$IdUser = $_GET["id"];
echo $IdUser;

$sql = "DELETE FROM users WHERE Id = $IdUser;";
$result = $conn->query($sql);

if ($conn->query($sql) === true) {
    echo "user deleted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: http://localhost:8080/e-commerce/php/admin_panel/admin_panel.php');



?>