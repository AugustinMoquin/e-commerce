<?php

$bddadmin = new PDO('mysql:host=127.0.0.1;dbname=e-commerce','root','root');

if(isset($_POST['forminscription']))
{
    if(!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['passwd']))
    {
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $passwd = $_POST['passwd'];
        $passwd2 = $_POST['passwd2'];
        $passwdhash = sha1($_POST['passwd']);
        $passwd2hash = sha1($_POST['passwd2']);
        $usernamelength = strlen($username);
        $passwdlength = strlen($passwd);
        $test=Sécuritymdp($passwd,$passwdlength);
        if($usernamelength <= 50)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $requser= $bdd->prepare("SELECT * FROM users WHERE username = ?");
                $requser->execute(array($username));
                $userexist = $requser->rowCount();
                if($userexist==0)
                {
                    if($passwd == $passwd2)
                    {
                        if($passwdlength >=3 )
                        {
                            
                            if($test==4)
                            {
                                $insertmbr = $bdd->prepare("INSERT INTO users(email,username,passwd) VALUES(?,?,?)");
                                $insertmbr->execute(array($email,$username,$passwdhash));
                                $message = "Votre compte a bien était créé";
                            }
                            else
                            {
                                $message = "Votre Mot de passe n'est pas assez sécurise , il faut des mins , des maj , des chiffres et un caractéres spécial";
                            }
                        }
                        else
                        {
                            $message = "Votre Mdp n'est pas assez long";
                        }

                    }
                    else
                    {
                        $message ="Password incorrect";
                    }
                }
                else
                {
                    $message ="User déja existant";
                }
            }
            else
            {
                $message = "Votre adresse mail n'est pas valide !";
            }

        }
        else
        {
            $message = "votre pseudo ne doit pas depasse 50 charactère";

        }
    }
    else
    {
        $message ="Tous les champs doivent etre compléter";
    }
}

if(isset($_POST['formconnexion']))
{
    session_start();
    if(!empty($_POST['username']) AND !empty($_POST['passwd']))
    {
        $username = htmlspecialchars($_POST['username']);
        $passwd = sha1($_POST['passwd']);


                $requser= $bdd->prepare("SELECT * FROM users WHERE username = ? AND passwd= ?");
                $requser->execute(array($username, $passwd));

                $userexist = $requser->rowCount();
                
                if($userexist>=1)
                {
                    $userinfo = $requser->fetch();
                    $_SESSION['Id'] = $userinfo['Id'];
                    $_SESSION['username'] = $userinfo['username'];
                    header("Location: profil.php?id=".$_SESSION['Id']);
                    $message= "tu es connécté";
                }
                else
                {
                    $message= "ce profil n'éxiste pas";
                }

    }
    else
    {
        $message ="Tous les champs doivent etre compléter";
    }
}

function Sécuritymdp($passwd,$passwdlength):int
{
    $security = 0;
    $securitymaj=0;
    $securityspe=0;
    $securitynum =0;
    for($i = 0; $i < $passwdlength; $i++)
    {
        $lettre = $passwd[$i];
        if ($lettre>='a' && $lettre<='z')
        {
            $security = 0;
            $security =$security+1 ;
        }
        elseif($lettre>='A' && $lettre <='Z')
        {
            $securitymaj=0;
            $securitymaj =$securitymaj+1 ;
        }
        else if ($lettre>='0' && $lettre<='9')
        {
            $securitynum =0;
            $securitynum =$securitynum+1 ;
        }
        else{
            $securityspe=0;
            $securityspe =$securityspe+1 ;
        }
        $final = $securityspe+$securitynum+$securitymaj+$security;
    }
    return $final;
}
?>
