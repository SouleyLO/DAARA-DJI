<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="ModifierMatiere2.php" method="post" id="myForm">
            <?php

                $Reference=$_GET['reference'];

                $serveur="localhost";
                $login="root";
                $mdp="";
                try {   
                    $connexion= new PDO("mysql:host=$serveur;dbname=schools",$login,$mdp);
                    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $request=$connexion->prepare(" SELECT * FROM matiere WHERE reference LIKE '$Reference' ");

                    $request->execute();

                    $reponse = $request->fetchall();
                    
                } catch (PDOException $e) {
                    echo 'We meet some problems please try again' .$e->getMessage();
                }
            
            ?>
        <table>
            
            <?php foreach($reponse as $matiere): ?>

                <th COLSPAN="2">Modification de la matiere: <?= $matiere['Reference'] ?></th>

                <tr>
                    <td></td>
                    <td><input type="hidden" name="reference" id="Reference" value="<?= $matiere['Reference'] ?>"></td>
                    <td><span id="error1"></span></td>
                </tr>
                <tr>
                    <td>Libelle</td>
                    <td><input type="text" name="libelle" id="Libelle" value="<?= $matiere['Libelle'] ?>"></td>
                    <td><span id="error2"></span></td>
                </tr>
                <tr>
                    <td>coef</td>
                    <td><input type="number" name="coef" id="coef" value="<?= $matiere['coef'] ?>"></td>
                    <td><span id="error3"></span></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Enregistrer"></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
    <script>
        let myForm = document.getElementById('myForm');

        myForm.addEventListener('submit',function(e){
            let ref = document.getElementById('Reference');
            
            if (ref.value.trim()=="") {
            let myError = document.getElementById('error1')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            let libelle = document.getElementById('Libelle');
            
            if (libelle.value.trim()=="") {
            let myError = document.getElementById('error2')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            let coef = document.getElementById('coef');
            
            if (coef.value.trim()=="") {
            let myError = document.getElementById('error3')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

        });
    </script>
</body>
</html>