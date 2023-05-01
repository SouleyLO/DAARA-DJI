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
    <link rel="stylesheet" href="Prof.css" />
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
        <img src="../image/logo.png" alt="chat icon">
      </a>

      <div class="main-navlinks">
        <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
          <span></span>
          <span></span> 
          <span></span>
        </button>
        <div class="navlinks-container">
          <a href="#" aria-current="page">Home</a>
          <a href="../Note/AfficherNote.php">Notes Etudiants</a>
          <a href="../Etudiant/AfficherEtudiant.php">Liste Etudiants</a>
          <a href="../Etudiant/AfficherEtudiant.php">Ajouter Note</a>
          <a href="#">A propos !</a>
        </div>
      </div>

      <div class="nav-authentication">
        <a href="#" class="sign-user" aria-label="Sign in page">
          <img src="../image/user.svg" alt="user-icon">
        </a>
        <div class="sign-btns">
            <button type="button" class="buttonD">DECONNEXION</button>
        </div>
      </div>
    </nav>


    <div class="welcome">
      Bienvenue <?= $_SESSION['userfirstname']?> <?= $_SESSION['username']?> <br>
      Voici vos informations personnelles
    </div>

    <table class="table">
      <tr class="table-dark">
        <th>Identifiant</th>
        <td><?= $_SESSION['user']?></td>
      </tr>
      <tr>
        <th>Nom</th>
        <td><?= $_SESSION['username']?></td>
      </tr>
      <tr>
        <th>Prenom</th>
        <td><?= $_SESSION['userfirstname']?></td>
      </tr>
      <tr>
        <th>Sexe</th>
        <td><?= $_SESSION['sexe']?></td>
      </tr>
      <tr>
        <th>Date de naissance</th>
        <td><?= $_SESSION['date']?></td>
      </tr>
      <tr>
        <th>Mail</th>
        <td><?= $_SESSION['mail']?></td>
      </tr>
      <tr>
        <th>Adresse</th>
        <td><?= $_SESSION['adresse']?></td>
      </tr>
    </table>


    <div class="fond">
      <img src="../image/img5.jpg" alt="chat icon">
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
        
        document.querySelector(".buttonD").addEventListener("click", function(){
          window.open("../deconnexion.php")
        })
  
    </script>
  </body>
</html>
