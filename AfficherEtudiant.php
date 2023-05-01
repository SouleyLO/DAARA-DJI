<?php

    // $Identifiant=$_POST['identifiant'];
    // $code=$_POST['code'];

    $serveur="localhost";
    $login="root";
    $mdp="";
        try {   
            $connexion= new PDO("mysql:host=$serveur;dbname=schools",$login,$mdp);
            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request=$connexion->prepare(" SELECT * FROM user order by code");

            $request->execute();

            $reponse=$request -> fetchall();
            
        } catch (PDOException $e) {
            echo 'We meet some problems please try again' .$e->getMessage();
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            position: relative;
            right: -400px;
            font-size: 56px;
        }
        .popup{
            background: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 130%;
            position: absolute;
            top: 0px;
            display: none;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .popup-content{
            height: 310px;
            width: 500px;
            background: white;
            padding: 20px;
            border-radius: 5px;
            position: relative;
        }

        p{
            margin: 10px auto;
            display: block;
            position: relative;
            top: 5px;
            font-size: 35px;
            width: 160px;
            height: 30px;
            padding: 15px;
            border: 1px solid gray
        }

        .logo{
            top: -15px;
            height: 90px;
            right: -5px;
            width: 130px;
            padding: 0;
            border-radius: 5px;
            position: relative;
        }

        .ligne{
            position: relative;
            top: -5px;
            padding: 5%;
        }

        h3{
            position: relative;
            top: -10px;
            font-size: 20px;
        }

        
        .buttonS{
            background: Black;
            position: relative;
            top: 25px;
            right: 30PX;
            font-size: 16px;
            font-weight: bolder;
            height: 30px;
            width: 115px;
            padding: 5px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }
        
        .buttonA{
            background: Black;
            position: relative;
            top: 25px;
            right: -40PX;
            font-size: 16px;
            font-weight: bolder;
            height: 30px;
            width: 115px;
            padding: 5px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        .accueil {
            position: relative;
            top:60px;
            width: 120px;
            right: -70px
        }

        .buttonS a{
            text-decoration: none;
            background: Black;
            color: #a95534;
        }
        .buttonA a{
            text-decoration: none;
            background: Black;
            color: #a95534;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }
        th{
            background: #a95534;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {background-color: rgba(0, 0, 7, 0.158);}
    </style>
</head>
<body>

    <h1>Liste des Etudiants</h1>
    <table>
        <tr>
            <th>Id Etudiant</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Sexe</th>
            <th>Date de naissance</th>
            <th>Mail</th>
            <th>Adresse</th>
            <th>Code Classe</th>
            <th COLSPAN="2">OPTIONS</th>
            <!-- <th>Mot de Passe</th> -->
        </tr>
        <?php foreach($reponse as $etudiant): ?>
            <?php if($etudiant['Statut']==="etudiant"){ ?>
                <tr>
                    <td><?= $etudiant['Identifiant'] ?></td>
                    <td><?= $etudiant['Nom'] ?></td>
                    <td><?= $etudiant['Prenom'] ?></td>
                    <td><?= $etudiant['Sexe'] ?> </td>
                    <td><?= $etudiant['Date_Naissance'] ?></td>
                    <td><?= $etudiant['Mail'] ?> </td>
                    <td><?= $etudiant['Adresse'] ?></td>
                    <td><?= $etudiant['Code'] ?></td>  
                    <td> <a href="ModifierEtudiant1.php?identifiant=<?= $etudiant['Identifiant'] ?>"> Modifier</a> </td>
                    <td> <button><a id="<?= $etudiant['Identifiant'] ?><?= $etudiant['Identifiant'] ?>">Supprimer</a></button> </td>

                    <!-- <td>//$etudiant['MotDePasse'] ?></td> -->
                </tr>   
            <?php } ?>        
        <?php endforeach; ?>
        
    </table>
    <?php foreach($reponse as $etudiant): ?>
        <?php if($etudiant['Statut']==="etudiant"){ ?>
            <div class="popup" id="<?= $etudiant['Identifiant']?>">
                <div class="popup-content">
                    <img src="../image/logo.png" alt="logo" class="logo">
                    <hr style="width:100%;top: -300px;">
                    <h3>Voullez vous Supprimer les informations de:</h3>
                    <p class="var"><?= $etudiant['Identifiant'] ?></p>
                    <button class="buttonS"><a href="SupprimerEtudiant?identifiant=<?= $etudiant['Identifiant']?>">SUPPRIMER</a></button>
                    <button class="buttonA"><a href="AfficherEtudiant.php">ANNULER</a></button>
                </div>
            </div>
        <?php } ?>
    <?php endforeach; ?>

    <script>
        <?php foreach($reponse as $etudiant): ?>
            <?php if($etudiant['Statut']==="etudiant"){ ?>
                document.getElementById("<?= $etudiant['Identifiant'] ?><?= $etudiant['Identifiant'] ?>").addEventListener("click", function(){
                    document.getElementById("<?= $etudiant['Identifiant']?>").style.display = "flex";
                })

                document.querySelector(".buttonA").addEventListener("click", function(){
                    document.getElementById("<? $etudiant['Identifiant']?>").style.display = "none"
                })
            <?php } ?>
        <?php endforeach; ?>
    </script>
</body>
</html>