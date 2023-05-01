<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="ModifierProf2.php" method="post" id="myForm">
            <?php

                $Identifiant=$_GET['identifiant'];

                $serveur="localhost";
                $login="root";
                $mdp="";
                try {   
                    $connexion= new PDO("mysql:host=$serveur;dbname=schools",$login,$mdp);
                    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $request=$connexion->prepare(" SELECT * FROM user WHERE identifiant LIKE '$Identifiant' ");

                    $request->execute();

                    $reponse = $request->fetchall();
                    
                } catch (PDOException $e) {
                    echo 'We meet some problems please try again' .$e->getMessage();
                }
            
            ?>
        <table>
            
            <?php foreach($reponse as $prof): ?>

                <th COLSPAN="2">Modification du Prof <?= $prof['Identifiant'] ?></th>

                <tr>
                    <td></td>
                    <td><input type="hidden" name="identifiant" id="Identifiant" value="<?= $prof['Identifiant'] ?>"></td>
                    <td><span id="error1"></span></td>
                </tr>
                <tr>
                    <td>NOM</td>
                    <td><input type="text" name="nom"  id="Nom" value="<?= $prof['Nom'] ?>"></td>
                    <td><span id="error2"></span></td>
                </tr>
                <tr>
                    <td>PRENOM</td>
                    <td><input type="text" name="prenom" id="Prenom" value="<?= $prof['Prenom'] ?>"></td>
                    <td><span id="error3"></span></td>
                </tr>
                <tr>
                    <td>SEXE</td>
                    <td>
                    HOMME
                        <input type="radio" name="sexe" id="Sexe" value="HOMME"/> 
                    FEMME
                        <input type="radio" name="sexe" id="Sexe" value="FEMME"/>
                    </td>
                    <td><span id="error4"></span></td>
                </tr>
                <tr>
                    <td>Date de naissance:</td>
                    <td><input type="date" name="date" id="Date" value="<?= $prof['Date_Naissance'] ?>"></td>
                    <td><span id="error5"></span></td>
                </tr>
                <tr>
                    <td>MAIL</td>
                    <td><input type="email" name="mail" id="Mail" value="<?= $prof['Mail'] ?>"></td>
                    <td><span id="error6"></span></td>
                </tr>
                <tr>
                    <td>ADRESSE</td>
                    <td><input type="text" name="adresse" id="Adresse" value="<?= $prof['Adresse'] ?>"></td>
                    <td><span id="error7"></span></td>
                </tr>
                <tr>
                    <td>Mot De Passe:</td>
                    <td><input type="password" name="motdepasse" id="Motdepasse"></td>
                    <td><span id="error8"></span></td>
                </tr>
                <tr>
                    <td>Confirmer Mot De Passe:</td>
                    <td><input type="password" id="Confirmer"></td>
                    <td><span id="error10"></span></td>
                    
                </tr>
                <tr>
                    <td><span id="error11"></span></td>
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

            let nom = document.getElementById('Nom');
            
            if (nom.value.trim()=="") {
            let myError = document.getElementById('error2')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            let prenom = document.getElementById('Prenom');
            
            if (prenom.value.trim()=="") {
            let myError = document.getElementById('error3')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            let sexe = document.getElementById('Sexe');
            
            if (sexe.value.trim()=="") {
            let myError = document.getElementById('error4')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            let date = document.getElementById('Date');
            
            if (date.value.trim()=="") {
            let myError = document.getElementById('error5')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            let mail = document.getElementById('Mail');
            
            if (mail.value.trim()=="") {
            let myError = document.getElementById('error6')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            let adresse = document.getElementById('Adresse');
            
            if (adresse.value.trim()=="") {
            let myError = document.getElementById('error7')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            let mdp = document.getElementById('Motdepasse');
            
            if (mdp.value.trim()=="") {
            let myError = document.getElementById('error8')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            let confirm = document.getElementById('Confirmer');
            
            if (confirm.value.trim()=="") {
            let myError = document.getElementById('error10')

            myError.innerHTML = "Ce champ est obligatoire";
            myError.style.color ="red";
            e.preventDefault();
            }

            if (confirm.value.trim()!=mdp.value.trim()) {
                let myError = document.getElementById('error11')

                myError.innerHTML = "Mot de passe incorrecte";
                myError.style.color ="red";
                e.preventDefault();
            }

        });
    </script>
</body>
</html>