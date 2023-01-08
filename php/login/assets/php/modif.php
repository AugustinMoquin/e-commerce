<?php
  // Connexion à la base de données
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=e-commerce','root','root');

  if (isset($_COOKIE['id']) > 0) {
    $getid = intval($_COOKIE['id']);
    $requser= $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();


    // Mise à jour des informations de profil
    if (isset($_POST["update-profil"])) {
      // Email
      if (isset($_POST['email']) && !empty($_POST['email']) && $_POST['email'] != $userinfo['email']) {
        $newemail = htmlspecialchars($_POST['email']);
        $insertemail = $bdd->prepare("UPDATE users SET email = ? WHERE id = ?");
        $insertemail->execute(array($newemail, $getid));
      }

      // Age
      if (isset($_POST['age']) && !empty($_POST['age']) && $_POST['age'] != $userinfo['age']) {
        $newage = htmlspecialchars($_POST['age']);
        $insertage = $bdd->prepare("UPDATE users SET age = ? WHERE id = ?");
        $insertage->execute(array($newage, $getid));
      }

      // Adresse
      if (isset($_POST['adresse']) && !empty($_POST['adresse']) && $_POST['adresse'] != $userinfo['adresse']) {
        $newadresse = htmlspecialchars($_POST['adresse']);
        $insertadresse = $bdd->prepare("UPDATE users SET adresse = ? WHERE id = ?");
        $insertadresse->execute(array($newadresse, $getid));
      }

      // Ville
      if (isset($_POST['ville']) && !empty($_POST['ville']) && $_POST['ville'] != $userinfo['ville']) {
        $newville = htmlspecialchars($_POST['ville']);
        $insertville = $bdd->prepare("UPDATE users SET ville = ? WHERE id = ?");
        $insertville->execute(array($newville, $getid));
      }

      // Pays
      if (isset($_POST['pays']) && !empty($_POST['pays']) && $_POST['pays'] != $userinfo['pays']) {
        $newpays = htmlspecialchars($_POST['pays']);
        $insertpays = $bdd->prepare("UPDATE users SET pays = ? WHERE id = ?");
        $insertpays->execute(array($newpays, $getid));
        setcookie('pays',$userinfo['pays'], time()+3600*24, '/', '', true, true);
      }

      if (isset($_POST['newpassword']) && !empty($_POST['newpassword']) 
      && isset($_POST['confirmpassword']) && !empty($_POST['confirmpassword'])) {
        if($_POST['newpassword'] == $_POST['confirmpassword']) {
          $newpassword = ($_POST['newpassword']);
          $passwdlength = strlen($newpassword);
          $test=Sécuritymdp($newpassword,$passwdlength);
              // Les mots de passe correspondent, nous pouvons mettre à jour le mot de passe de l'utilisateur dans la base de données
              $newpasswordhash = sha1($_POST['newpassword']);
              $updatepassword = $bdd->prepare("UPDATE users SET passwd = ? WHERE id = ?");
              $updatepassword->execute(array($newpasswordhash, $getid));
              $message="ahaha";
              header('Location: profil.php?id='.$getid);
            

            }
          }
          header("Location: /e-commerce/php/compte");
          setcookie( 'mail', $userinfo['email'], time()+3600*24, '/', '', true, true);
          setcookie( 'pays', $userinfo['pays'], time()+3600*24, '/', '', true, true);
    }
}

function Sécuritymdp($newpassword,$passwdlength):int
{
    $security = 0;
    $securitymaj=0;
    $securityspe=0;
    $securitynum =0;
    for ($i = 0; $i < $passwdlength; $i++) {
        $lettre = $newpassword[$i];
        if ($lettre>='a' && $lettre<='z') {
            $security = 0;
            $security =$security+1 ;
        }elseif ($lettre>='A' && $lettre <='Z') {
            $securitymaj=0;
            $securitymaj =$securitymaj+1 ;
        }elseif ($lettre>='0' && $lettre<='9') {
            $securitynum =0;
            $securitynum =$securitynum+1 ;
        }else {
            $securityspe=0;
            $securityspe =$securityspe+1 ;
        }
        $final = $securityspe+$securitynum+$securitymaj+$security;
    }
    
    return $final;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <div class="profil__avatar"></div>
      <div class="profil__nom"><?php if (isset($userinfo)) { echo "Profil de : " 
        , $userinfo['username']; } else { echo "Nom d'utilisateur"; }?></div>
        <div class="profil__information">
          <form  class="input-group"  method="POST">
            <div class="profil__info__item profil__info__item--email">
              <label for="email">Email:</label>
              <input type="email" name="email" value="<?php if (isset($userinfo)) 
              { echo $userinfo['email']; } else { echo ""; }?>">
            </div>
            <div class="profil__info__item profil__info__item--ville">
              <label for="ville">Ville:</label>
              <input type="text" name="ville" id="ville" 
              value="<?php if (isset($userinfo)) { echo $userinfo['ville']; } else { echo ""; } ?>">
            </div>
            <div class="profil__info__item profil__info__item--pays">
              <label for="pays">Pays:</label>
              <input type="text" name="pays" id="pays" 
              value="<?php if (isset($userinfo)) { echo $userinfo['pays']; } else { echo ""; }  ?>">
            </div>
            <div class="profil__info__item profil__info__item--submit">
            </div>
              <div class="profil__info__item profil__info__item--newpassword">
                  <label for="newpassword">Nouveau mot de passe:</label>
                  <input type="password" name="newpassword" id="newpassword">
                </div>
                <div class="profil__info__item profil__info__item--confirmpassword">
                  <label for="confirmpassword">Confirmer le nouveau mot de passe:</label>
                  <input type="password" name="confirmpassword" id="confirmpassword">
                </div>
                <input type="submit" name="update-profil" value="Mettre à jour">
              </div>
  
          </form>
        </div>



</body>
</html>