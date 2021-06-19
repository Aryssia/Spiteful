<?php
    session_start();
    include("connexion.php");

    if(isset($_GET['search']));
    {
        $seacrh=htmlspecialchars($_GET['search']);
        require"connexion.php";
        $req=$bdd->prepare("SELECT * FROM ")
    }
    else
    {
        header("LOCATION")
    }

?>