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
                $query_upload="INSERT INTO products (photo) VALUES ('$target_path')";
                if ($conn->query($query_upload) === true) {
                    //echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }else {

            exit("Error While uploading image on the server");
            }
        }
    closeCon($conn);
    //echo $target_path;
?>




<div class="container">
    <header>

    </header>

    <div class="Title">
        <h1>AJOUT DE PRODUIT</h1>
    </div>
    <div class="container_all">
        <div class="container_insertImage">
            <form enctype="multipart/form-data" action="" method="post">
                <label>Upload Your Image
                    <input type="file" name="uploadedimage" />
                </label>
                <input type="submit" value="Envoyer l'image" />
            </form>
            <h3>Image du produit</h3>
            <div class="image_container">
                <img src="<?php echo $target_path; ?>" class = "container_insertImage_Image" alt="Image">
            </div>
        </div>
        <div class="container_info">
            <form action="process.php" class="container_info" method="POST">
                <div>
                    <label class="name"> Nom du produit
                        <input type="text" name = "name" class = "name_input"/>
                    </label>
                </div>

                <div class="price_contain">
                    <label class="price"> Prix
                        <input type="text" name = "price" class = "price_input"  />
                    </label>
                    <label class="price">Pourcentage de réduction
                        <input type="text" name = "reduc" class = "reduc_input"/>
                    </label>
                </div>

                <label class="category">Catégories
                    <select class = "category_select" name = "category" >
                        <option>jsp</option>
                    </select>
                </label>

                <div class="container_status">
                    <div class="status">
                        <label>Status du produit
                            <select class = "status" name = "status" >
                                <option>en stock</option>
                                <option>commandé</option>
                                <option>rupture</option>
                            </select>
                        </label>
                    </div>

                    <div >
                        <label class="quantity">Quantité
                            <input type="number" class = "quantity_input"  name = "quantity" />
                        </label>
                    </div>

                    <div >
                        <label class="taxe">Taxe
                            <label>oui
                                <input type="radio" name = "taxe" value = "oui" />
                            </label>
                            <label>non
                                <input type="radio" name = "taxe" value = "non" />
                            </label>
                        </label>
                    </div>

                </div>
                <div>
                    <label class = "description"> Description
                        <input type="text" class = "description_input" name = "description">
                    </label>
                </div>
                <div name="image_path" value = "<?php $target_path ?>" ></div>

                <div class="wrap">
                    <input type="submit" value="Submit Page" class = " button"/>
                </div>
                
            </form>
        </div>
    </div>
    
    
    
    
    <footer>
        
    </footer>
        
</div>



</body>
</html>