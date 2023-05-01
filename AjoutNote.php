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
        $NumEtudiant=$_POST['numetudiant'];
        $Reference=$_POST['reference'];
        $cc=$_POST['cc'];
        $ds=$_POST['ds'];

        $serveur="localhost";
        $login="root";
        $mdp="";
        try {   
            $connexion= new PDO("mysql:host=$serveur;dbname=schools",$login,$mdp);
            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request="insert into note values ('$NumEtudiant','$Reference',$cc,$ds)";
            $connexion -> exec($request);
            echo 'Informations enregistrées avec succés';
        } catch (PDOException $e) {
            echo 'We meet some problems please try again' .$e->getMessage();
        }
        
    ?>
    <table border="1">
            <tr>
                <td>Numero Etudiant</td>
                <td><?php echo($NumEtudiant)?></td>
            </tr>
            <tr>
                <td>Reference</td>
                <td><?php echo($Reference)?></td>
            </tr>
            <tr>
                <td>Note CC</td>
                <td><?php echo($cc)?></td>
            </tr>
            <tr>
                <td>Note DS</td>
                <td><?php echo($ds)?></td>
            </tr>
        </table>
</body>
</html>