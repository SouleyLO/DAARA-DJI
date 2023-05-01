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
        $Reference=$_POST['reference'];
        $Libelle=$_POST['libelle'];
        $coef=$_POST['coef'];

        $serveur="localhost";
        $login="root";
        $mdp="";
        try {   
            $connexion= new PDO("mysql:host=$serveur;dbname=schools",$login,$mdp);
            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request="insert into matiere values ('$Reference','$Libelle',$coef)";
            $connexion -> exec($request);
            echo 'Informations enregistrées avec succés';
        } catch (PDOException $e) {
            echo 'We meet some problems please try again' .$e->getMessage();
        }
        
    ?>
    <table border="1">
            <tr>
                <td>Reference</td>
                <td><?php echo($Reference)?></td>
            </tr>
            <tr>
                <td>libelle</td>
                <td><?php echo($Libelle)?></td>
            </tr>
            <tr>
                <td>coef</td>
                <td><?php echo($coef)?></td>
            </tr>
        </table>
        <a href="../Accueil.html">Accueil</a>
</body>
</html>