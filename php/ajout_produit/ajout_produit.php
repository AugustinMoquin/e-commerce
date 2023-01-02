<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ajout_produit/assets/css/ajout_produit_style.css">
    <title>Document</title>
</head>

<body>

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
    && $_POST['status'] && $_POST['quantity'] && $_POST['taxe'] && $_POST['description'] > 0 && !empty($_FILES["uploadedimage"])
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
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error While uploading image on the server";
        sleep(3);
        header('Location: http:8080//localhost/e-commerce/php/ajout_produit/ajout_produit.php');
    }

}




// if (!empty($_FILES["uploadedimage"])) {

//     $file_name=$_FILES["uploadedimage"]["name"];
//     $temp_name=$_FILES["uploadedimage"]["tmp_name"];
//     $imgtype=$_FILES["uploadedimage"]["type"];
//     $ext= GetImageExtension($imgtype);
//     $imagename= $file_name."-".date("d-m-Y")."-".time().$ext;
//     $target_path = "../images/".$imagename;

//     if (move_uploaded_file($temp_name, $target_path)) {
//         $query_upload="INSERT INTO products (images_path, NAME, regular_price, discount_price,
//          category, product_status, quantity, taxable, description)
//         VALUES ('$target_path', '$name', '$price', '$reduc', '$category',
//          '$status', '$quantity', '$taxe', '$description')";
//         if ($conn->query($query_upload) === true) {
//             //echo "New record created successfully";
//         } else {
//             echo "Error: " . $sql . "<br>" . $conn->error;
//         }
//     }else {
//         header('Location: http://localhost/e-commerce/php/ajout_produit/ajout_produit.php');
//         echo "Error While uploading image on the server";

//     }
// }


closeCon($conn);
?>



    <header>

    </header>

    <div class="container">

        <div class="Title">
            <h1>AJOUT DE PRODUIT</h1>
        </div>
        <div class="container_all">
            <form enctype="multipart/form-data" action="" method="post">
                <div class="container_info">
                    <label>Upload Your Image
                        <input type="file" name="uploadedimage" />
                    </label>

                    <div>
                        <label class="name"> Nom du produit
                            <input type="text" name="name" class="name_input" />
                        </label>
                    </div>

                    <div class="price_contain">
                        <label class="price"> Prix
                            <input type="text" name="price" class="price_input" />
                        </label>
                        <label class="price">Pourcentage de réduction
                            <input type="text" name="reduc" class="reduc_input" />
                        </label>
                    </div>

                    <label class="category">Catégories
                        <select class="category_select" name="category">
                            <option>jsp</option>
                        </select>
                    </label>

                    <div class="container_status">
                        <div class="status">
                            <label>Status du produit
                                <select class="status" name="status">
                                    <option>en stock</option>
                                    <option>commandé</option>
                                    <option>rupture</option>
                                </select>
                            </label>
                        </div>

                        <div>
                            <label class="quantity">Quantité
                                <input type="number" class="quantity_input" name="quantity" />
                            </label>
                        </div>

                        <div>
                            <label class="taxe">Taxe
                                <label>oui
                                    <input type="radio" name="taxe" value="oui" />
                                </label>
                                <label>non
                                    <input type="radio" name="taxe" value="non" />
                                </label>
                            </label>
                        </div>

                    </div>
                    <div>
                        <label class="description"> Description
                            <input type="text" class="description_input" name="description">
                        </label>
                    </div>
                    <div name="image_path" value="<?php $target_path ?>"></div>

                    <div class="wrap">
                        <input type="submit" value="Submit Page" class=" button" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer>

    </footer>

    </div>



</body>

</html>