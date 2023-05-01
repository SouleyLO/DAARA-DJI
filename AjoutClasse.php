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
        $Code=$_POST['code'];
        $NomClasse=$_POST['nomclasse'];
        $NombrEleve=$_POST['nombreleve'];

        $serveur="localhost";
        $login="root";
        $mdp="";
        try {   
            $connexion= new PDO("mysql:host=$serveur;dbname=schools",$login,$mdp);
            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request="insert into classe values ('$Code','$NomClasse',$NombrEleve)";
            $connexion -> exec($request);
            echo 'Informations enregistrées avec succés';
        } catch (PDOException $e) {
            echo 'We meet some problems please try again' .$e->getMessage();
        }
        
    ?>
    <table border="1">
            <tr>
                <td>Code</td>
                <td><?php echo($Code)?></td>
            </tr>
            <tr>
                <td>Nom de la classe</td>
                <td><?php echo($NomClasse)?></td>
            </tr>
            <tr>
                <td>Nombre d'Etudiant</td>
                <td><?php echo($NombrEleve)?></td>
            </tr>
        </table>
</body>
</html>