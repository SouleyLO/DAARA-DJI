
<?php 
    $Reference=$_POST['reference'];
    $libelle=$_POST['libelle'];
    $coef=$_POST['coef'];

    $serveur="localhost";
    $login="root";
    $mdp="";
    try {  
         
        $connexion= new PDO("mysql:host=$serveur;dbname=schools",$login,$mdp);
        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $request=" UPDATE matiere SET 
            Reference = '$Reference',
            Libelle = '$libelle',
            coef = '$coef'
        WHERE reference = '$Reference' ";

        $connexion -> exec($request);

        header("location:AfficherMatiere.php");

    } catch (PDOException $e) {
        echo 'We meet some problems please try again'.$e->getMessage();
    }
        
?>