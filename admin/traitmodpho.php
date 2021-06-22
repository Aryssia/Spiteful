<?php
    session_start();

    if(!isset($_SESSION['admin']))
    {
        header("LOCATION:administration.php");
    }

    include('connexion.php');


    if(!isset($_GET['id'])){
        header("LOCATION:mod.php");
    }


    $id =htmlspecialchars($_GET['id']);
    require "connexion.php";

        $req = $bdd->prepare("SELECT * FROM photos WHERE id=?");
        $req->execute(['id']);

        /*TEST EXISTE BDD */
        if(!$don = $req->fetch())
        {
            $req->closeCursor();
            header("LOCATION:administration.php");
        }
        $req->closeCursor();

    /*TEST FORMULAIRE */
    if(isset($_POST['nompho']))
    {
        $error=0;

        if(empty($_POST['nompho']))
        {
            $error=1;
        }
        else{
            $nompho = htmlspecialchars($_POST['nompho']);
        }

        if(empty($_POST['slidepho']))
        {
            $error=2;
        }
        else{
            $nompho = htmlspecialchars($_POST['slidepho']);
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
            header("LOCATION:modifier.php?err=".$err);
        }
        
    }
    else{
        header('LOCATION:modifier.php?id='.$id);
    }
?>