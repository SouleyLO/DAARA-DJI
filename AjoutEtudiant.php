<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $Identifiant=$_POST['identifiant'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $sexe=$_POST['sexe'];
        $date=$_POST['date'];
        $mail=$_POST['mail'];
        $adresse=$_POST['adresse'];
        $motdepasse=$_POST['motdepasse'];
        $code=$_POST['code'];

        $serveur="localhost";
        $login="root";
        $mdp="";
        try {   
            $connexion= new PDO("mysql:host=$serveur;dbname=schools",$login,$mdp);
            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request="insert into user values ('$Identifiant','$nom','$prenom','$sexe','$date','$mail','$adresse','$motdepasse','etudiant','$code')";
            $connexion -> exec($request);
            echo 'Informations enregistrées avec succés';
        } catch (PDOException $e) {
            echo 'We meet some problems please try again' .$e->getMessage();
        }
        
    ?>
    <table border="1">
            <tr>
                <td>Identifiant</td>
                <td><?php echo($Identifiant)?></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><?php echo($nom)?></td>
            </tr>
            <tr>
                <td>Prenom</td>
                <td><?php echo($prenom)?></td>
            </tr>
            <tr>
                <td>sexe</td>
                <td><?php echo($sexe)?></td>
            </tr>
            <tr>
                <td>Date de naissance</td>
                <td><?php echo($date)?></td>
            </tr>
            <tr>
                <td>Mail</td>
                <td><?php echo($mail)?></td>
            </tr>
            <tr>
                <td>adresse</td>
                <td><?php echo($adresse)?></td>
            </tr>
            <tr>
                <td>Mot de Passe</td>
                <td><?php echo($motdepasse)?></td>
            </tr>
            <tr>
                <td>Code</td>
                <td><?php echo($code)?></td>
            </tr>
        </table>
        <a href="../Accueil.html">Accueil</a>
</body>
</html>