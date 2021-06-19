<?php
    session_start();
    
    if(!isset($_SESSION['admin']))
    {
        header("LOCATION:administration.php");
    }

    include("connexion.php");

    if(!isset($_GET['id']))
    {
        header("LOCATION:administration.php?err=id");
    }
    else
    {
        $id=htmlspecialchars(($_GET['id']));
    }


    $err=0;
    if(isset($_POST['nompho']))
    {
       if($_POST['nompho']=='')
       {
            $err=9;
       }
       else
       {
           $nompho=htmlspecialchars($_POST['nompho']);
       }
       if($_POST['slidepho']=='')
       {
           $err=10;
       }
       else
       {
           $slidepho=htmlspecialchars($_POST['slidepho']);
       }
       if($_POST['image']=='')
       {
           $err=11;
       }
       else
       {
           $image=htmlspecialchars($POST['image']);
       }

       if($err==0)
       {
            $update=$bdd->prepare("UPDATE photos SET nompho=:np, slidepho=:sp, image=:img WHERE id=:id");
            $update->execute(array(
                "np"=>$nompho,
                "sp"=>$slidepho,
                "img"=>$image
            ));
            $update->closeCursor();
            header("LOCATION:administration.php?valid=modif");
       }
       else
       {
           header("LOCATION:administration.php?error".$err);
       }
    }
    else
    {
        header("LOCATION:administration.php?err=isset");
    }
?>
