<?php
    session_start();
    include("connexion.php");
    if(isset($_POST['admin']))
    {
        if($_POST['admin']!=="" OR $_POST['password']!=="")
        {
            $admin=htmlspecialchars($_POST['admin']);
            $password=htmlspecialchars($_POST['password']);
    
            $reqlog=$bdd->prepare("SELECT * FROM login WHERE admin=?");
            $reqlog->execute(array($admin));
    
            if($donlog=$reqlog->fetch())
            {
                if(password_verify($password,$donlog['password']))
                {
                    $_SESSION['admin']=$donlog['admin'];
                    header("LOCATION:administration.php#blocadmin");
                }
                else
                {
                    header("LOCATION:administration.php?error=3");
                }
            }
            else
            {
                header("LOCATION=administration.php?error=2");
            }
            $reqlog->closeCursor();
        }
        else
        {
            header("LOCATION=administration.php?error=1");
        }
    }
    
    if(isset($_GET['deco']))
    {
        session_destroy();
        header("LOCATION:administration.php");
    }
if(isset($_GET['delimg']))
{
    $delete=$bdd->prepare("DELETE FROM photos WHERE id=?");
    $delete->execute(array($_GET['id']));
    header("LOCATION:administration.php");
}

if(isset($_GET['delvid']))
{
    $delete=$bdd->prepare("DELETE FROM videos WHERE id=?");
    $delete->execute(array($_GET['id']));
    header("LOCATION:administration.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleadmin1.css"/>

    <script src="../scripts/jquery-3.2.1.min.js"></script>
    <script src="../scripts/jquery.inview.min.js"></script>
    <script type="../JS/animation.js">
    </script>

    <title>Administration Spiteful</title>
    <link rel="icon" href="../images/Illu/Logo Spiteful Final.png">
    <link rel="stylesheet" type="text/css" href="../styleIPHONEX.css"/>
</head>
<body>
    <nav>
        <div id="connexion">
            <h1>CONNECTES-TOI</h1>
            
            <div id="bloco">
                <?php
                
                if(isset($_SESSION['admin']))
                {
                    echo'<div class="BJR">';
                        echo'<div id="bjr"><b>Bonjour</b>, '.$_SESSION['admin'].'</div>';
                        echo'<div id="deco"><a href="administration.php?deco=ok">Déconnexion</a></div>';
                    echo'</div>';
                }
                else
                {
                echo'
                <form method="POST" action="administration.php" id="form">
                    <label class="textform" for="admin">Administrateur:<input type="text" id="Admin" name="admin"></label>
                    <label class="textform" for="password">Mot de passe:<input type="text" id="Mdp" name="password"></label>
                    <input id="boutco" type="submit" value="Connexion">
                </form>';

                    if(isset($_GET['error']))
                    {
                        switch($_GET['error'])
                        {
                            case 1:
                                echo'Veuillez vous identifier, Merci';
                                break;
                            case 2:
                                echo'';
                                break;
                            case 3:
                                echo'';
                                break;
                            default:
                        }
                    }
                }
                
                ?>
                
            </div>
 
        </div>
           
        <div id="burgerbout" class="burger">
            <div class="bar"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
           
    </nav>

    <div class="Menu">
        <h4>MENU</h4>
        <div id="options">
            <div><a href="../#Menunav">Accueil</a></div>
            <div><a href="../#slideHist">Histoire</a></div>
            <div><a href="../#slideProd">Produits</a></div>
            <div><a href="../#slideAni">Animaux</a></div>
            <div><a href="../#slideVid">Vidéos</a></div>
            <div><a href="../#slideCont">Contact</a></div>
        </div> 
    </div>

    <?php
        if(isset($_SESSION['admin']))
        {
            echo'<div id="blocadmi">';
                echo'<div class="bloctext">
                        <div id="mambav"></div>
                        <div id="titreP"><h2>PHOTOS</h2></div>
                    </div>';
                
                echo'<div class="bloctext">';
                    echo'<div id="PHOTOS">';
                        echo'<div class="ajouter"><a href="ajouter.php">AJOUTER</a></div>';
                        
                            $reqimg=$bdd->query("SELECT * FROM photos");
                            while($donimg=$reqimg->fetch())
                            {
                                echo'
                                <div class="photos">
                                    <div class="slide"><b>'.$donimg['slide'].'</b></div>
                                    <div class="nom">'.$donimg['nom'].'</div>
                                    <div class="photo"><img src="../images/JPEG/'.$donimg['photo'].'" alt="Mamba vert"></div>
                                    <div class="modifier"><a href="modifier.php?id='.$donimg["id"].'">MODIFIER</a></div>
                                    <div class="supprimer"><a href="administration.php?id='.$donimg["id"].'&delimg=ok">SUPPRIMER</a></div>
                                </div>
    
                                ';
                            }   
                    echo'</div>';
                echo'</div>';
            echo'</div>';
        
            echo'<div id="blocvid">';
                echo'<div class="bloctext">';
                    echo'<div id="VIDEOS">';
                        echo'<div class="ajouter"><a href="ajouter.php">AJOUTER</a></div>';

                        $reqvid=$bdd->query("SELECT * FROM videos");
                        while($donvid=$reqvid->fetch())
                        {
                            echo'
                            <div class="videos">
                                <div class="slide"><b>'.$donvid["slide"].'</b></div>
                                <div class="nom">'.$donvid["nom"].'</div>
                                <div class="video"></div>
                                <div class="modifier" ><a href="modifier.php?id='.$donvid["id"].'">MODIFIER</a></div>
                                <div class="supprimer"><a href="administration.php?id='.$donvid["id"].'&delvid=ok">SUPPRIMER</a></div>
                            </div>';
                        }
                    echo'</div>';
                echo'</div>';
        
                echo'<div class="bloctext">
                        <div id="meduse"></div>
                        <div id="titreV"><h2>VIDEOS</h2></div>
                    </div>';
            echo'</div>';
        }
    ?>
</body>
<script src="../JS/animation.js"></script>
</html>