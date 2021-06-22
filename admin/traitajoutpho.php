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
        if(empty($_POST['nompho']))
        {
            $err=1;
        }
        else
        {
            $nompho=htmlspecialchars($_POST['nompho']);
        }

        if(empty($_POST['slidepho']))
        {
            $err=2;
        }
        else
        {
            $slidepho=htmlspecialchars($_POST['slidepho']);
        }
        

        if($err===0)
        {
            $dossier = "../images/";
            $fichier = basename($_FILES["image"]["name"]);
            $tailleMax = 200000;
            $taille = filesize($_FILES['image']['tmp_name']);
            $extensions = ['.png', '.jpg', '.jpeg', '.gif', '.svg'];
            $extension = strrchr($_FILES['image']['name'],'.');

            if(!in_array($extension, $extensions))
            {
                $fileError = "wrong-extension";
            }

            if($taille > $tailleMax)
            {
                $fileError = "size";
            }

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