<?php
    $error=0;
    if(isset($_POST['nom']))
    {
        if($_POST['nom']=="")
        {
            $error=1;
        }
        else
        {
            $nom=htmlspecialchars($_POST['nom']);
        }

        if($_POST['prenom']=="")
        {
            $error=2;
        }
        else
        {
            $prenom=htmlspecialchars($_POST['prenom']);
        }

        if($_POST['mail']=="")
        {
            $error=3;
        }
        else
        {
            
            
        if(preg_match('#^[A-Za-z0-9._-]+@[A-Za-z0-9._-]{2,}\.[A-Za-z]{2,4}$#',''.$_POST['mail'].''))
            {
                $mail=htmlspecialchars($_POST['mail']);
            }
            else
            {
                $error=4;
            }
        }

        if($_POST['mess']=="")
        {
            $error=5;
        }
        else
        {
            $mess=htmlspecialchars($_POST['mess']);
        }



        if($error==0)
        {
            include("connexion.php");
            $insert=$bdd->prepare("INSERT INTO contact (nom,prenom,mail,mess,date) VALUE (:nom,:prenom,:mail,:mess,NOW())");
            $insert->execute(array(
                ':nom'=>$nom,
                ':prenom'=>$prenom,
                ':mail'=>$mail,
                ':mess'=>$mess,
            ));
            $insert->closeCursor();
            header("LOCATION:accueil.php?error=".$error."");
        }
        else
        {
            header("LOCATION:accueil.php?err=".$error."");
        }
    }
    else
    {
        header("LOCATION:accueil.php?error");
    }
?>