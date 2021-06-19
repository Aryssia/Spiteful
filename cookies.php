<?php
    if(!isset($_COOKIE['style']))
    {
        header("LOCATION:index.php");
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <?php
     echo '<link rel="stylesheet" type="text/css" href="'.$_COOKIE["style"].'"/>';
    ?>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUIT/ JOUR</title>
</head>
<body>
    <?php
    if($_COOKIE['style']=='style.css')
    {
        
    }
    else
    {
        if($_COOKIE['style']=='stylemode.css'){

        }
        else{

        }
    }
    
    ?>
</body>
</html>