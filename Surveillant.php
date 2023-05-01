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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Surveillant.css" />
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
          <a href="">HOME</a>
          <a href="../Etudiant/AfficherEtudiant.php">Etudiant</a>
          <a href="../Prof/AfficherProf.php">Prof</a>
          <a href="../Surveillant/AfficherSurveillant.php">Surveillant</a>
          <a href="">A propos!</a>
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

    
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Etudiant
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
        <li><a class="dropdown-item" href="../Etudiant/AjoutEtudiant.html">Ajouter Etudiant</a></li>
        <li><a class="dropdown-item" href="../Etudiant/AfficherEtudiant">Afficher Etudiants</a></li>
      </ul>
    </div>
    <div class="dropdown" id="Prof">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Prof
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
        <li><a class="dropdown-item" href="../Prof/AjoutProf.html">Ajouter Prof</a></li>
        <li><a class="dropdown-item" href="../Prof/AfficherProf">Afficher Profs</a></li>
      </ul>
    </div>
    <div class="dropdown" id="Surveillant">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Surveillant
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
        <li><a class="dropdown-item" href="../Surveillant/AjoutSurveillant.html">Ajouter Surveillant</a></li>
        <li><a class="dropdown-item" href="../Surveillant/AfficherSurveillant">Afficher Surveillants</a></li>
      </ul>
    </div>

    <div class="dropdown" id="Classe">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Classe
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
        <li><a class="dropdown-item" href="../Classe/AjoutClasse.html">Ajouter Classe</a></li>
        <li><a class="dropdown-item" href="../Classe/AfficherClasse">Afficher Classes</a></li>
      </ul>
    </div>

    <div class="dropdown" id="Matiere">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Matiere
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
        <li><a class="dropdown-item" href="../Matiere/AjoutMatiere.html">Ajouter Matiere</a></li>
        <li><a class="dropdown-item" href="../Matiere/AfficherMatiere">Afficher Matieres</a></li>
      </ul>
    </div>

    <div class="dropdown" id="Note">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Notes
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
        <li><a class="dropdown-item" href="../Note/AjoutNote.html">Ajouter Notes</a></li>
        <li><a class="dropdown-item" href="../Note/AfficherNote">Afficher Notes</a></li>
      </ul>
    </div>





    <div class="welcome">
      Bienvenue <?= $_SESSION['userfirstname']?> <?= $_SESSION['username']?> <br>
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








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

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
