<?php
    session_start();

    if(!isset($_SESSION['admin']))
    {
        header("LOCATION:administration.php");
    }

    include('connexion.php');

    $err=0;
    if(isset($_POST['nompho']))
    {
        if($_POST['nompho']=='')
        {
            $err=6;
        }
        else
        {
            $nompho=htmlspecialchars($_POST['nompho']);
        }
        if($_POST['slidepho']=='')
        {
            $err=7;
        }
        else
        {
            $slidepho=htmlspecialchars($_POST['slidepho']);
        }
        if($_POST['image']=='')
        {
            $err=8;
        }
        else
        {
            $image=htmlspecialchars($_POST['image']);
        }

        if($err==0)
        {
            $insert=$bdd->prepare("INSERT INTO photos(nompho,slidepho,image) VALUES (:np,:sp,:img)");
            $insert->execute(array(
                "np"=>$nompho,
                "sp"=>$slidepho,
                "img"=>$image
            ));
            $insert->closeCursor();
            header("LOCATION:administration.php");
        }
        else
        {
            header("LOCATION:ajouter.php?err=".$err);
        }
    }
    else
    {
        header("LOCATION:admin.php");
    }

?>