<?php
    session_start();

    if(!isset($_SESSION['admin']))
    {
        header("LOCATION:administration.php");
    }

    include('connexion.php');

    $err=0;
    if(isset($_POST['nomvid']))
    {
        if(empty($_POST['nomvid']))
        {
            $err=1;
        }
        else
        {
            $nompho=htmlspecialchars($_POST['nomvid']);
        }

        if(empty($_POST['slidevid']))
        {
            $err=2;
        }
        else
        {
            $slidepho=htmlspecialchars($_POST['slidevid']);
        }
        

    }
    else
    {
        header("LOCATION:admin.php");
    }

?>