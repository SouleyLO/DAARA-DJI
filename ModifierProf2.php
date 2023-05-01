
<?php 
    $Identifiant=$_POST['identifiant'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $sexe=$_POST['sexe'];
    $date=$_POST['date'];
    $mail=$_POST['mail'];
    $adresse=$_POST['adresse'];
    $motdepasse=$_POST['motdepasse'];

    $serveur="localhost";
    $login="root";
    $mdp="";
    try {   
        $connexion= new PDO("mysql:host=$serveur;dbname=schools",$login,$mdp);
        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $request=" UPDATE user SET 
            Identifiant = '$Identifiant',
            Nom = '$nom',
            Prenom = '$prenom',
            Sexe = '$sexe',
            Date_Naissance = '$date',
            Mail = '$mail',
            Adresse = '$adresse',
            MotDePasse = '$motdepasse',
            Statut = 'prof',
            Code = '' 
        WHERE identifiant = '$Identifiant' ";

        $connexion -> exec($request);

        header("location:AfficherProf.php");

    } catch (PDOException $e) {
        echo 'We meet some problems please try again'.$e->getMessage();
    }
        
?>