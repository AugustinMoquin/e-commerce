<?php
include ("../db_connection.php");

$conn = open_Con();

$name = $_POST['name'];
$price = $_POST['price'];
$reduc = $_POST['reduc'];
$category = $_POST['category'];
$status = $_POST['status'];
$quantity = $_POST['quantity'];
$taxe = $_POST['taxe'];
$description = $_POST['description'];


$file_name=$_FILES["uploadedimage"]["name"];
$temp_name=$_FILES["uploadedimage"]["tmp_name"];
$imgtype=$_FILES["uploadedimage"]["type"];
$ext= GetImageExtension($imgtype);
$imagename= $file_name."-".date("d-m-Y")."-".time().$ext;
$target_path = "../images/".$imagename;

echo $target_path;


$query_upload="INSERT INTO products 
(NAME, regular_price, discount_price, category, product_status, quantity, taxable, description) 
VALUES ('$name', '$price', '$reduc', '$category', '$status', '$quantity', '$taxe', '$description')";
if ($conn->query($query_upload) === true) {
    echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}


closeCon($conn);
