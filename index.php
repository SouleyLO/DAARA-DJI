<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Flex:opsz,wght@8..144,100;8..144,300;8..144,500;8..144,700;8..144,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <nav>

      <a href="#" class="nav-icon" aria-label="visit homepage" aria-current="page">
        <img src="image/logo.png" alt="chat icon">
      </a>

      <div class="main-navlinks">
        <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
          <span></span>
          <span></span> 
          <span></span>
        </button>
        <div class="navlinks-container">
          <a href="#">Home</a>
          <a href="#">Contacter-nous</a>
          <a href="#">Mots du Directeur</a>
          <a href="#">A propos !</a>
        </div>
      </div>

      <div class="nav-authentication">
        <a href="#" class="sign-user" aria-label="Sign in page">
          <img src="image/user.svg" alt="user-icon">
        </a>
        <div class="sign-btns">
          <a href="#" class="buttonC">CONNEXION</a>
        </div>
      </div>
    </nav>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active" id="first">
          <img class="photo" src="image/logo.png" alt="Los Angeles">
        </div>

        <div class="item">
          <img class="photo" src="image/img1.png" alt="Chicago">
        </div>

        <div class="item">
          <img class="photo" src="image/img3.png" alt="New York">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="fond">
      <img src="image/img5.jpg" alt="chat icon">
    </div>

    <div class="zylo">
      <label for="">DAARDJI</label> est une plateforme de gestion de note, réalisé par l'Etudiant Souleymane LO en Juillet 2022 en guise de projet de stage pour l'obtention du DIplôme Supérieur de Technologie en Informatique (DSTI) à l'Ecole Superieur Polytechnique de L'Université Cheikh Anta Diop de Dakar(UCAD).
    </div>






    <div class="popup">
      <div class="popup-content">
        <img src="image/logo.png" alt="logo" class="logo">
        <img src="image/close.jpg" alt="logo" class="close">
        <h3>Veuillez vous identifier</h3>
        <hr class="hr1">
        <form action="connexion.php" method="post">
          <input type="text" placeholder="Identifiant" name="identifiant" 
            <?php if(isset($_SESSION['userid'])){ ?>
              value="<?= $_SESSION['userid'] ?>"
            <?php } ?>
          >
          <input type="password" placeholder="Mot de Passe" class="passmot" name="Mdp" autocomplete="off">
          <i class="fa fa-eye" id="eye"></i>
          <i class="fa fa-eye-slash" id="eye-slash"></i>
          <div id="Error"></div>
          <div id="Error1"></div>
          <button type="submit" class="buttonA">CONNEXION</button>
        </form>
      </div>
    </div>
    
    
    <script>
      const hamburgerToggler = document.querySelector(".hamburger")
      const navLinksContainer = document.querySelector(".navlinks-container");

      const toggleNav = () => {
        hamburgerToggler.classList.toggle("open")

        const ariaToggle = hamburgerToggler.getAttribute("aria-expanded") === "true" ?  "false" : "true";
        hamburgerToggler.setAttribute("aria-expanded", ariaToggle)

        navLinksContainer.classList.toggle("open")
      }
      hamburgerToggler.addEventListener("click", toggleNav)

      new ResizeObserver(entries => {
        if(entries[0].contentRect.width <= 900){
          navLinksContainer.style.transition = "transform 0.3s ease-out"
        } else {
          navLinksContainer.style.transition = "none"
        }
      }).observe(document.body)

      document.querySelector(".buttonC").addEventListener("click", function(){
          document.querySelector(".popup").style.display = "flex"
        })
      document.querySelector(".sign-user").addEventListener("click", function(){
          document.querySelector(".popup").style.display = "flex"
        })

      document.querySelector(".close").addEventListener("click", function(){
          document.querySelector(".popup").style.display = "none"
        })

      document.getElementById("eye-slash").addEventListener("click", function(){
          document.querySelector(".passmot").type = "password"
          document.getElementById("eye").style.display = "flex"
          document.getElementById("eye-slash").style.display = "none"
        })
      document.getElementById("eye").addEventListener("click", function(){
          document.querySelector(".passmot").type = "text"
          document.getElementById("eye").style.display = "none"
          document.getElementById("eye-slash").style.display = "flex"
        })
        

        <?php if(isset($_GET['login_err'])){ ?>
          document.querySelector(".popup").style.display = "flex"
          <?php if($_GET['login_err'] === "password"){ ?>
            let myError = document.getElementById('Error')
            
            myError.innerHTML ="Mot de Passe incorrect";
            myError.style.color ="red";
          <?php }else{ ?>
            let myError = document.getElementById('Error1')
            
            myError.innerHTML ="Utilisateur Invalide";
            myError.style.color ="red";
          <?php } ?>
        <?php } ?>

    </script>
  </body>
</html>
