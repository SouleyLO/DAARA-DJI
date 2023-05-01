<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="ModifierNote2.php" method="post" id="myForm">
            <?php

                $Identifiant=$_GET['identifiant'];

                $serveur="localhost";
                $login="root";
                $mdp="";
                try {   
                    $connexion= new PDO("mysql:host=$serveur;dbname=schools",$login,$mdp);
                    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $request=$connexion->prepare(" SELECT * FROM note WHERE identifiant LIKE '$Identifiant' ");

                    $request->execute();

                    $reponse = $request->fetchall();
                    
                } catch (PDOException $e) {
                    echo 'We meet some problems please try again' .$e->getMessage();
                }
            
            ?>
        <table>
            
            <?php foreach($reponse as $note): ?>

                <th COLSPAN="2">Modification des notes de <?= $note['Identifiant'] ?></th>

                <tr>
                    <td></td>
                    <td><input type="hidden" name="identifiant" id="Identifiant" value="<?= $note['Identifiant'] ?>"></td>
                    <td><span id="error1"></span></td>
                </tr>
                <tr>
                    <td>Reference</td>
                    <td><input type="hidden" name="reference"  id="Reference" value="<?= $note['Reference'] ?>"></td>
                    <td><span id="error2"></span></td>
                </tr>
                <tr>
                    <td>CC</td>
                    <td><input type="text" name="cc" id="CC" value="<?= $note['CC'] ?>"></td>
                    <td><span id="error3"></span></td>
                </tr>
                <tr>
                    <td>DS</td>
                    <td><input type="text" name="ds" id="DS" value="<?= $note['DS'] ?>"></td>
                    <td><span id="error4"></span></td>
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
            let num = document.getElementById('Identifiant');
            
            if (num.value.trim()=="") {
            let myError = document.getElementById('error1')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            let reference = document.getElementById('Reference');
            
            if (reference.value.trim()=="") {
            let myError = document.getElementById('error2')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            let cc = document.getElementById('CC');
            
            if (cc.value.trim()=="") {
            let myError = document.getElementById('error3')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            let ds = document.getElementById('DS');
            
            if (ds.value.trim()=="") {
            let myError = document.getElementById('error4')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

        });
    </script>
</body>
</html>