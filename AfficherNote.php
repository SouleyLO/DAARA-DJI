<?php
    session_start();
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
            text-align: left;
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
<?php

    $serveur="localhost";
    $login="root";
    $mdp="";
        try {   
            $connexion= new PDO("mysql:host=$serveur;dbname=schools",$login,$mdp);
            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request=$connexion->prepare(" SELECT * FROM note ORDER BY reference");

            $request->execute();

            $reponse=$request->fetchall();
            
        } catch (PDOException $e) {
            echo 'We meet some problems please try again' .$e->getMessage();
        }
        
    ?>
    <h1> Voici les Notes</h1>
    <table>
        <tr>
            <th>Identifiant Etudiant</th>
            <th>Note CC</th>
            <th>Note DS</th>
            <th>Matiere</th>
            <th COLSPAN="2">OPTIONS</th>
        </tr>
        <?php foreach($reponse as $note): ?>
            <tr>

                <td><?= $note['Identifiant'] ?></td>
                <td><?= $note['CC'] ?></td>
                <td><?= $note['DS'] ?></td>
                <td><?= $note['Reference'] ?></td>
                <td> <a href="ModifierNote1.php?identifiant=<?= $note['Identifiant'] ?>"> Modifier</a> </td>
                <td> <button><a id="<?= $note['Identifiant'] ?><?= $note['Identifiant'] ?>">Supprimer</a></button> </td>

            </tr>         
        <?php endforeach; ?>
    
    </table>



    <?php foreach($reponse as $note): ?>
            <div class="popup" id="<?= $note['Identifiant']?>">
                <div class="popup-content">
                    <img src="../image/logo.png" alt="logo" class="logo">
                    <hr style="width:100%;top: -300px;">
                    <h3>Voullez vous Supprimer les informations de:</h3>
                    <p class="var"><?= $note['Identifiant'] ?></p>
                    <button class="buttonS"><a href="SupprimerNote?identifiant=<?= $note['Identifiant']?>">SUPPRIMER</a></button>
                    <button class="buttonA"><a href="AfficherNote.php">ANNULER</a></button>
                </div>
            </div>
    <?php endforeach; ?>

    <script>
        <?php foreach($reponse as $note): ?>
                document.getElementById("<?= $note['Identifiant'] ?><?= $note['Identifiant'] ?>").addEventListener("click", function(){
                    document.getElementById("<?= $note['Identifiant']?>").style.display = "flex";
                })

                document.querySelector(".buttonA").addEventListener("click", function(){
                    document.getElementById("<? $note['Identifiant']?>").style.display = "none"
                })
        <?php endforeach; ?>
    </script>
</body>
</html>