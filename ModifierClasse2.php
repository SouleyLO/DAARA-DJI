
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

        $request=" UPDATE classe SET 
            Code = '$Code',
            NomClasse = '$NomClasse',
            NombrEleve = '$NombrEleve'
        WHERE code = '$Code' ";

        $connexion -> exec($request);

        header("location:AfficherClasse.php");

    } catch (PDOException $e) {
        echo 'We meet some problems please try again'.$e->getMessage();
    }
        
?>