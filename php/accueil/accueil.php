<?php
include 'db_connection.php';
$conn = openCon();
echo "Connected Successfully";
CloseCon($conn);
?>