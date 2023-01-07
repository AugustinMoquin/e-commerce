<?php
    require_once ("ajout_produit.php");
?>
    
    
    
    
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../ajout_produit/assets/css/ajout_produit_style.css">
        <title>Add product</title>
    </head>

    <body>

    <nav>

    <div class="heading">

    <h4 >Kermit & Ci</h4>
    <img src="../../php/images/icons8-monkas-48.png" alt="img" class="logo">


    </div>

    <ul class="nav-links">

    <li><a href="/e-commerce/php/">Home</a></li>

    <li><a href="/e-commerce/php/contact_us">Compte</a></li>

    <li><a class="active" href="services.html">Favoris</a></li>

    <li><a href="">Panier</a></li>

    </ul>

    </nav>

        <div class="container">
            <div class="container_all">
                <form enctype="multipart/form-data" action="/e-commerce/php/ajout_produit/process.php" method="post">
                    <div class="container_info">
                    <div class="err">
                    <?php 
                        if (isset($message))
                            echo $message;
                        ?>
                    </div>
                    <label>Upload Your Image</label>
                            <input type="file" name="uploadedimage" placeholder=/>
                            

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

                            <div style="display: flex;">
                                <label class="description"> Description
                                    <input type="text" class="description_input" name="description">
                                </label><label class="taxe">Taxe
                                    <label>oui
                                        <input type="radio" name="taxe" value="oui">
                                    </label>
                                    <label>non
                                        <input type="radio" name="taxe" value="non">
                                    </label>
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