<?php
    include("../db_connection.php");

    $conn = openCon();
    function GetImageExtension($imagetype)
    {
        if (empty($imagetype))
            return false;
        switch ($imagetype) {
            case 'image/bmp':
                return '.bmp';
            case 'image/gif':
                return '.gif';
            case 'image/jpeg':
                return '.jpg';
            case 'image/png':
                return '.png';
            default:
                return false;
        }
    }

    if (
        isset($_POST['name']) && $_POST['price'] && $_POST['reduc'] && $_POST['category']
        && $_POST['status'] && $_POST['quantity'] && $_POST['taxe'] && $_POST['description'] > 0 
        && !empty($_FILES["uploadedimage"])
    ) {

        $name = $_POST['name'];
        $price = $_POST['price'];
        $reduc = $_POST['reduc'];
        $category = $_POST['category'];
        $status = $_POST['status'];
        $quantity = $_POST['quantity'];
        $taxe = $_POST['taxe'];
        $description = $_POST['description'];


        $file_name = $_FILES["uploadedimage"]["name"];
        $temp_name = $_FILES["uploadedimage"]["tmp_name"];
        $imgtype = $_FILES["uploadedimage"]["type"];
        $ext = GetImageExtension($imgtype);
        $imagename = $file_name . "-" . date("d-m-Y") . "-" . time() . $ext;
        $target_path = "../images/" . $imagename;

        if (move_uploaded_file($temp_name, $target_path)) {
            $query_upload = "INSERT INTO products (images_path, NAME, regular_price, discount_price,
            category, product_status, quantity, taxable, description)
            VALUES ('$target_path', '$name', '$price', '$reduc', '$category',
            '$status', '$quantity', '$taxe', '$description')";
            if ($conn->query($query_upload) === true) {
                $message = "New record created successfully";
                header('Location: /e-commerce/php/ajout_de_produit/');

            } else {
                $message =  "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $message = "Error While uploading image on the server";
            header('Location: /e-commerce/php/ajout_de_produit');
        }
        
    }else {
        $message = "rentrez toutes les inforations";
        header('Location: /e-commerce/php/ajout_de_produit');
    }
closeCon($conn);

?>