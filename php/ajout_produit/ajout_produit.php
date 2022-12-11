<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/add_product.php">
    <title>Document</title>
</head>
<body>

<?php
include ("../db_connection.php");

$conn = openCon();
    function GetImageExtension($imagetype)
     {
       if (empty($imagetype)) return false;
       switch ($imagetype){
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }



if (!empty($_FILES["uploadedimage"])) {

    $file_name=$_FILES["uploadedimage"]["name"];
    $temp_name=$_FILES["uploadedimage"]["tmp_name"];
    $imgtype=$_FILES["uploadedimage"]["type"];
    $ext= GetImageExtension($imgtype);
    $imagename= $file_name."-".date("d-m-Y")."-".time().$ext;
    $target_path = "../images/".$imagename;

    if (move_uploaded_file($temp_name, $target_path)) {
        $query_upload="INSERT INTO products (images_path) VALUES ('$target_path')";
        if ($conn->query($query_upload) === true) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }else {

    exit("Error While uploading image on the server");
    }
}
closeCon($conn);
echo $target_path;
?>




<header>

</header>

<div class="Title">
    <h1>AJOUT DE PRODUIT</h1>
</div>

<div class="container">
    <div class="container_insertImage">
        <form enctype="multipart/form-data" action="" method="post">
            <label>Upload Your Image
                <input type="file" name="uploadedimage" />
            </label>
            <input type="submit" value="Envoyer l'image" />
        </form>
        <h3>Image du produit</h3>
        <div class="container_insertImage_Image">
            <img src="<?php echo $target_path; ?>" alt="Image">
        </div>
    </div>
    <form action="process.php">
        


        <input type="submit" value="Submit Page" />
    </form>
</div>




<footer>

</footer>





</body>
</html>