
<?php 
    $Identifiant=$_POST['identifiant'];
    $reference=$_POST['reference'];
    $cc=$_POST['cc'];
    $ds=$_POST['ds'];

    $serveur="localhost";
    $login="root";
    $mdp="";
    try {  
         
        $connexion= new PDO("mysql:host=$serveur;dbname=schools",$login,$mdp);
        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $request=" UPDATE note SET 
            Identifiant = '$Identifiant',
            Reference = '$reference',
            CC = '$cc',
            DS = '$ds'
        WHERE identifiant = '$Identifiant' ";

        $connexion -> exec($request);

        header("location:AfficherNote.php");

    } catch (PDOException $e) {
        echo 'We meet some problems please try again'.$e->getMessage();
    }
        
?>