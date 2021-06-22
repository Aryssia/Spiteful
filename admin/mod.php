<?php
    session_start();
    
    if(!isset($_SESSION['admin']))
    {
        header("LOCATION:administration.php");
    }

    include("connexion.php");
    
    if(isset($_GET['id']))
    {
        $id=htmlspecialchars($_GET['id']);
    }
    else
    {
        header("LOCATION:administration.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylemsa.css"/>
    <link rel="icon" href="../images/Illu/Logo Spiteful Final.png.png"/>
    <title>Modifier</title>
    <link rel="icon" href="../images/Illu/Logo Spiteful Final.png">
</head>
<body>

    <div id="bloc">
    <div id="titre">
        <h1><a href="mod.php">Modifier</a></h1><br/>
        <h2><a href="ajouter.php">Ajouter</a></h2>
    </div>

        <div class="bloctext">
            <div id="titreP"><h3>PHOTOS</h3></div>
        
        <?php
        $reqmp=$bdd->prepare("SELECT * FROM photos WHERE id=?");
        $reqmp->execute(array($id));

        while($donmp=$reqmp->fetch())
        {
            echo'
            <form method="POST" action="traitmodifpho.php?id='.$donmp['id'].'">
                <label for="slide">Slide :</label>
                <select name="select" id="sel" value="'.$donmp['slidepho'].'">
                    <option>SLIDE Accueil</option>
                    <opyion>SLIDE Histoire</option>
                    <option>SLIDE Produits</option>
                    <option>SLIDE Animaux</option>
                    <option>SLIDE Vidéos</option>
                    <option>SLIDE Contact</option>
                </select><br/>
                <label for="nom">Nom :</label>
                <input type="text" placeholder="Nouveau nom" value="'.$donmp['nompho'].'"/><br/>
                <label for="photos">Photos :</label>
                <input type="file" name="image" value="'.$donmp['image'].'"/><br/>
                <input type="submit" class="bout" value="Valider"/> 
            </form>
            ';
        }
        $reqmp->closeCursor();

        if(isset($_GET['err']))
        {
            echo'<font color="red">Error</font>';
        }
        
        ?>
        
        <div class="slideshow-container-anim'">
        <div id="anim1" class="mySlide fade">
            <?php
            $reqimg=$bdd->query("SELECT image FROM photos LIMIT 6 OFFSET 6");
            while($donimg=$reqimg->fetch())
            {
                echo'
                <img src="../images/Illu/'.$donimg['image'].'">
                ';
            }
            ?>
            
        </div>   
        </div>
        </div>
        

        <div class="bloctext">
            <div class="slideshow-container-anim'">
            <div id="anim2" class="mySlide fade">
                <?php
                $reqimg=$bdd->query("SELECT image FROM photos LIMIT 6 OFFSET 6");
                while($donimg=$reqimg->fetch())
                {
                    echo'
                    <img src="../images/Illu/'.$donimg['image'].'">
                    ';
                }
                ?>
                
            </div>   
            </div>
            <div id="titreV"><h3>VIDEOS</h3></div>

        <form method="POST" action=" ">
            <label for="slide">Slide :</label>
            <select>
                <option>SLIDE Accueil</option>
                <opyion>SLIDE Histoire</option>
                <option>SLIDE Produits</option>
                <option>SLIDE Animaux</option>
                <option>SLIDE Vidéos</option>
                <option>SLIDE Contact</option>
            </select><br/>
            <label for="nom">Nom :</label>
            <input type="text" placeholder="Nouveau nom"/><br/>
            <label for="videos">Vidéos :</label>
            <input type="file" name="video"/><br/>
            <input type="submit" class="bout" value="Valider"/>
        </form>
        </div>
    </div>
</body>
</html>