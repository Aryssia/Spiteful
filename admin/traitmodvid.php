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

        $req = $bdd->prepare("SELECT * FROM videos WHERE id=?");
        $req->execute(['id']);

        /*TEST EXISTE BDD */
        if(!$don = $req->fetch())
        {
            $req->closeCursor();
            header("LOCATION:administration.php");
        }
        $req->closeCursor();

    /*TEST FORMULAIRE */
    if(isset($_POST['nomvid']))
    {
        $error=0;

        if(empty($_POST['nomvid']))
        {
            $error=1;
        }
        else{
            $nompho = htmlspecialchars($_POST['nomvid']);
        }

        if(empty($_POST['slidepho']))
        {
            $error=2;
        }
        else{
            $nompho = htmlspecialchars($_POST['slidevid']);
        }

        
        
    }
    else{
        header('LOCATION:modifier.php?id='.$id);
    }
?>