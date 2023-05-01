<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="ModifierClasse2.php" method="post" id="myForm">
            <?php

                $Code=$_GET['code'];

                $serveur="localhost";
                $login="root";
                $mdp="";
                try {   
                    $connexion= new PDO("mysql:host=$serveur;dbname=schools",$login,$mdp);
                    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $request=$connexion->prepare(" SELECT * FROM classe WHERE code LIKE '$Code' ");

                    $request->execute();

                    $reponse = $request->fetchall();
                    
                } catch (PDOException $e) {
                    echo 'We meet some problems please try again' .$e->getMessage();
                }
            
            ?>
        <table>
            
            <?php foreach($reponse as $classe): ?>

                <th COLSPAN="2">Modification de la classe: <?= $classe['Code'] ?></th>

                <tr>
                    <td></td>
                    <td><input type="hidden" name="code" id="Code" value="<?= $classe['Code'] ?>"></td>
                    <td><span id="error1"></span></td>
                </tr>
                <tr>
                    <td>Nom Classe</td>
                    <td><input type="text" name="nomclasse" id="NomClasse" value="<?= $classe['NomClasse'] ?>"></td>
                    <td><span id="error2"></span></td>
                </tr>
                <tr>
                    <td>Nombre d'Eleve</td>
                    <td><input type="number" name="nombreleve" id="NombrEleve" value="<?= $classe['NombrEleve'] ?>"></td>
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
            let code = document.getElementById('Code');
            
            if (code.value.trim()=="") {
            let myError = document.getElementById('error1')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            let nomclasse = document.getElementById('NomClasse');
            
            if (nomclasse.value.trim()=="") {
            let myError = document.getElementById('error2')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            let NombrEleve = document.getElementById('NombrEleve');
            
            if (NombrEleve.value.trim()=="") {
            let myError = document.getElementById('error3')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

        });
    </script>
</body>
</html>