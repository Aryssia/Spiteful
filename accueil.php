<?php
    session_start();
    include("connexion.php");

        if(isset($_GET['mode']))
        {
            if($_GET['mode']==1){
                setcookie('mode','clair', time() + 365*24*3600, null, null, false, true);
            }
            else{
                setcookie('mode','sombre', time() + 365*24*3600, null, null, false, true);
            }
            header("LOCATION:index.php");
        }
    

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <?php        
    if(isset($_COOKIE['mode']))
     {
        if($_COOKIE['mode']=='sombre')
        {
            echo"<link rel='stylesheet' type='text/css' href='style2.css'>"; 
        }
        else{
            echo"<link rel='stylesheet' type='text/css' href='style.css'>";
        }
     }
     else
     {
        echo"<link rel='stylesheet' type='text/css' href='style.css'>";
     }
    ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/Illu/Logo Spiteful Final.png.png"/>
    <link rel="stylesheet" type="text/css" href="css/sal.css"/>
    <title>Spiteful</title>
    <script src="JS/sal.js"></script>
</head>


<body>
    
    <nav id="Menunav">
    <div id="logomenu"></div>
    <div>
        <ul>
            <li>
                <div id="burgerbout" class="burgerbout">
                    <div class="bar"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </li>
            <li>
                <a class="langue" href="site anglais">
                    EN
                </a>
            </li>
            <li>
                <div id="MODE">
                    <p0><a id="mode1" href='accueil.php?mode=1'>CLAIR</a></p0>
                    <p0>-</p0>
                    <p0><a id="mode2" href='accueil.php?mode=2'>SOMBRE</a></p0>
                </div>
            </li>
        </ul>
    </div>
    </nav>

    <div class="Menu">
        <h4>MENU</h4>
        <div id="options">
            <div><a href="#Menunav">Accueil</a></div>
            <div><a href="#slideHist">Histoire</a></div>
            <div><a href="#slideProd">Produits</a></div>
            <div><a href="#slideAni">Animaux</a></div>
            <div><a href="#slideVid">Vidéos</a></div>
            <div><a href="#slideCont">Contact</a></div>
        </div> 
    </div>

    <div id="slideAcc">

        <div class="bloctext">
            <div class="textacc">
                <p1>Spiteful est une marque de produits pharmaceutiques proposant différents médicaments pour divers maux.
                Chacun de ces produits est liés à un animal de cette Terre, car c'est à base de molécules provenant de divers venins que les scientifiques ont ecxtrait le peptide <b style="color:var(--o)">MIRACLE</b> pour vous soulager!</p1><br/>
                <br/>
                <p11>Ces médicaments sont présentés sous différentes formes:<br/>
                    <p12>Pilules</p12><br/>
                    <p12>Crème</p12>
                </p11>
            </div>
        </div>

        <div class="bloctext">
            <div id="mambaV"></div>
            <h1>VENIN</h1>
        </div>
        
        <div class="numpage">
            <p><b>- 01 -</b>/ - 06 -</p>
        </div>
        
        
    </div>
    

   <div id="slideHist">

        <div class="bloctext">
           <?php
            $reqsci=$bdd->query("SELECT * FROM sci");
            while($donsci=$reqsci->fetch())
            {
                echo'
                    <div id="scient1"><img src="images/Illu/Felice_Fontana_.png.png"/></div>
                    <h2>Naturaliste</h2>

                    <div class="textsci">
                        <div class="blocsci">
                            <p2>'.$donsci['nomsci'].'</p2><br/>
                            <p21><b>'.$donsci['prenomsci'].'</b></p21>
                        </div>

                        <div class="bloctextsci">
                        <div class="text"><p22>'.$donsci['textsci'].'</p22></div>
                        </div>
                    </div>
                ';
            }
            $reqsci->closeCursor();
           ?>
           <div id="barresci"></div>
                       
        </div>

        <div class="bloctext">
            <div id="texthist">
                <div><p>Les premières études sur les venins d'animaux ne sont pas
                aussi récente qu'on le pense. Depuis le 18s, différents scientifiques
                  s'y sont intérréssé.              
                </p></div>    
            </div>
            
        </div>

        <div class="numpage2">
            <p><b>- 02 -</b>/ - 06 -</p>
        </div>
    </div>

    <div id="slideProd">
        <div class="bloctext2">
            <div class="blocmedoc">
                <?php
                $reqmedoc=$bdd->query("SELECT * FROM medocs");
                while($donmedoc=$reqmedoc->fetch())
                {
                    echo'
                        <h6>'.$donmedoc["nomedoc"].'</h6><br/>
                        <div class="blocexpmedoc">
                            <p3>'.$donmedoc["numero"].'</p3>
                            <div class="exp">
                            <p31>Composant du médicament</p31><br/>
                            <p32>Pourcentage du peptide</p32><P33>'.$donmedoc["pourc"].'</p33><br/>
                            <p32>'.$donmedoc["maladie"].'</p32>

                                <div class="numpageprod">
                                    <p><b>'.$donmedoc["numero"].'</b>/- 06 -</p>
                                </div>
                            </div>
                        </div>
                    ';

                }
                $reqmedoc->closeCursor();
                ?>
            
                <div class="slideshow-container">
                            <?php
                            $reqanim=$bdd->query("SELECT image FROM photos");
                            while($donanim=$reqanim->fetch())
                            {
                                echo'
                                <div class="mySlides fade">
                                <div id="mianim"><img src="images/PNG/'.$donanim['image'].'"></div>
                                </div>
                                ';
                            }
                            $reqanim->closeCursor();
                            ?>
                        
                            <div style="text-align:center">
                                <span class="dot" onclick="currentSlide(1)"></span> 
                                <span class="dot" onclick="currentSlide(2)"></span> 
                                <span class="dot" onclick="currentSlide(3)"></span>
                                <span class="dot" onclick="currentSlide(4)"></span> 
                                <span class="dot" onclick="currentSlide(5)"></span> 
                                <span class="dot" onclick="currentSlide(6)"></span>  
                            </div>
                </div>
            </div>
        </div>
        
        
        <div class="bloctext3">
            
            <div class="slideshow-container2">
            <div id="barprod"></div>
                <?php
                $reqmedoc2=$bdd->query("SELECT nomedoc, imagemed FROM medocs");
                while($donmedoc2=$reqmedoc2->fetch())
                {
                    echo'
                    <div id="Produit" class="mySlides2 fade">
                        <img src="images/PNG/'.$donmedoc2["imagemed"].'"/><br/>
                        <p35>'.$donmedoc2["nomedoc"].'</p35>
                    </div>
                    ';
                }
                $reqmedoc2->closeCursor();
                ?>

            </div>

            <?php
                $reqanim=$bdd->query("SELECT * FROM animaux");
                while($donanim=$reqanim->fetch())
                {
                    echo'
                    <div id="blocmambav">
                    <div class="textanim">
                        <p36>NOM:</p36><br/>
                        <p37></p37><br/>
                        <p37>'.$donanim['nomanim_2'].'</p37>
                    </div>

                    <div class="textanim">
                        <p36>HABITAT:</p36><br/>
                        <p37>'.$donanim['habitat_1'].'</p37><br/>
                        <p37>'.$donanim['habitat_2'].'</p37></p37>
                    </div>

                    <div class="textanim">
                        <p36>GUERISON:</p36><br/>
                        <p37>'.$donanim['peptide'].'</p37><br/>
                        <p37>'.$donanim['probleme'].'</p37>
                    </div>
                    </div>

                    <div class="anim">
                        <p38>'.$donanim['nomanim_1'].'</p38>
                        <div class="baranim"></div>
                    </div>
                    
                    ';
                }
                $reqanim->closeCursor();
                ?>    
                
        </div>

        <div class="numpage3">
            <p><b>- 03 -</b>/ - 06 -</p>
        </div>
    </div>
    </div>

    <div id="slideAni">
        <div class="bloctext31">
            <h6>Choisis</h6>
            <h5>un animal</h5>
            <div class="blocanim">
                <div id="Mambavert"><img src="images/JPEG/mambva.jpg" alt="Mamba Vert"></div>
                <div id="Cubomeduse"><img src="images/JPEG/Méduse.jpg" alt="Cuboméduse"></div>
                <div id="Araignee"><img src="images/JPEG/Araignée Banane.jpg" alt="Araignée banane"></div>
                <div id="Palythoa"><img src="images/JPEG/Palythoa.jpg" alt="Palythoa"></div>
                <div id="Mambanoir"><img src="images/JPEG/Black Mamba.jpg" alt="Mamba noir"></div>
                <div id="Conus"><img src="images/JPEG/Conus.jpg" alt="Conus Mage"></div>
            </div>
        </div>

        <div class="bloctext21">
            <div class="blocvidanim1" class="vidmambav">
                <div id="vidmambav" >
                    <p4>Mamba Vert</p4>
                    <video controls poster="images/JPEG/PS.jpg">
                        <source src="vidéos/FR/Charte graphique.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>

        <div class="numpage4">
            <p><b>- 04 -</b>/ - 06 -</p>
        </div>
    </div>

    <div id="slideVid">
        <div class="video">
            <div id="vid1">
                <video controls poster="images/JPEG/PS.jpg">
                    <source src="vidéos/FR/Présentation SPITEFUL fr.mp4" type="video/mp4">
                </video>
            </div> 
            <div id="vid2">
                <video controls poster="images/JPEG/CGF.jpg">
                    <source src="vidéos/FR/Charte graphique.mp4" type="video/mp4">
                </video>
            </div>
            <div id="vid3">
                <video controls poster="images/JPEG/PS.jpg">
                    <source src="vidéos/LOGO FI.mp4"/>
                </video>
            </div>
        </div>
            
        <div class="numpage5">
            <p><b>- 05 -</b>/ - 06 -</p>
        </div>
    </div>
    <div id="slideCont">
        <div class="bloctext">
        <div id="INFOR">
            <p6>Infos</p6><br/><br/>
            <div id="infos">
                    <div id="adresse">
                        <p62>E-mail:</p62><br/>
                            <p63>spiteful.produitspharma@gmail.com</p63><br/><br/>
                        <p62>Tel:</p62><br/>
                            <p63>(+32)065/55.22.48</p63><br/><br/>
                        <p62>Adresse:</p62><br/>
                            <p63>Quartier Hôpital</p63><br/>
                            <p63>Avenue Hippocrate 5</p63><br/>
                            <p63>4000 Liège</p63><br/>
                    </div>
                    <div id=carte><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1219.560184565722!2d5.564230974713011!3d50.563097899605616!2m3!1f0!2f39.0647406244768!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x47c0f8276cc1ca37%3A0x66fe1582134563d!2sEyeD%20Pharma%20S.A.!5e1!3m2!1sfr!2sbe!4v1619257307662!5m2!1sfr!2sbe" {width="250" height="300" style="border:0;" allowfullscreen="" loading="lazy"}></iframe></div>
            </div>
            <div>

            </div>
        </div>
        </div>

        <div class="bloctext">
            <div id="barrecont"></div>
            <div id="FORM"> 
                <p6>Contact</p6>
                <div id="formulaire">
                    <form method='POST' action="traitmess.php">
                        <label class="textform" for="Nom">Nom:</label> <input type="text" id="name" name="nom" value="Durieu"><br/>
                        <label class="textform" for="Prenom">Prénom:</label> <input type="text" id="surname" name="prenom" value="Marie"><br/>
                        <label class="textform" for="E_mail">E-mail:</label> <input type="text" id="mail" name="mail" value="email@gmail"><br/>
                        <label class="textform" for="Message">Message:</label><br/><br/>
                        <input type="text" id="mess" name="mess"><br/>
                        <a href="mail.php"><input id="boutenv" type="submit" value="Envoyer"></a>
                    </form>
                </div>
            </div>
        </div>

        <div class="numpage6">
            <p><b>- 06 -</b>/ - 06 -</p>
        </div>
    </div>

    <footer>
        <p_footer>2020/ Copyright EPSE/ Web Design & Responsive/ Flament Aryssia</p_footer>
        <p_footer>Site réalisé dans le cadre d'un TEI(Travail d'études intégrées) _ EPSE _ Aryssia Flament _ Bachelier Infographie</p_footer>
        <p_footer><a href="admin/administration.php">Administration</a></p_footer>
        <p_footer><a href="site anglais">EN</a></p_footer>
        <p_footer><a>Cookies</a></p_footer>
        
    </footer>


</body>

<script src="JS/animation.js"></script>
<script>

/*****CAROUSEL ANIMAUX */
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}




/* récup du html */
const slideHist = document.querySelector('#slideHist')
const textHist = document.querySelector('#texthist')

console.log(slideHist)
console.log(textHist)

var scrolling

document.body.addEventListener('scroll',()=>{
    scrolling= document.documentElement.scrollTop || window.scrollY || window.pageYOffset || document.body.scrollTop
   
    if(scrolling < slideHist.offsetTop)
    {
        textHist.classList.remove('opa')
    }else if(scrolling = slideHist.offsetTop)
    {
        textHist.classList.add('opa')
    }else{
        textHist.classList.remove('opa')
    }
    /*
          if(scrolling < pres.offsetTop)
                {
                   
                }else if((scrolling > pres.offsetTop) && (scrolling < contact.offsetTop))
                {
                   
                }else if(scrolling >= contact.offsetTop)
                {
                  
                }else{
                   
                }
    */

})
</script>
</html>