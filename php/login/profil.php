<?php
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=e-commerce','root','root');
    session_start();
    if(isset($_GET['id']) AND $_GET['id'] >0 )
    {
        $getid = intval($_GET['id']);
        $requser= $bdd->prepare('SELECT * FROM users WHERE id = ?');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
        
    
?>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Profil </title>
    </head>
    <body>

        <div>

            <h2>Profil de <?php echo $userinfo['username']; ?> </h2>
        </div>
    </body>
</html>

<?php
}
else{
    echo "erreur" ;

}
?>