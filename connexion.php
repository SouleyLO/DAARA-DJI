<?php
    session_start();
?>
<?php 
        
    if(isset($_POST['identifiant'])){        
            
            $_SESSION['userid'] = $_POST['identifiant'];
            $identifiant = $_POST['identifiant'];
            $password = $_POST['Mdp'];
            $serveur="localhost";
            $login="root";
            $mdp="";
            try{
                
                $connexion = new PDO("mysql:host=$serveur;dbname=schools",$login,$mdp);
                $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $request = $connexion->prepare(" SELECT * FROM user WHERE identifiant LIKE '$identifiant' ");
            
                $request->execute();
            
                $reponse=$request->fetchall();
                    
            } catch (PDOException $e) {
                    
                echo "We meet some problems please try again \n" .$e->getMessage();

            }

            if(isset($reponse)){
                $work= 0;
                foreach($reponse as $user){
                    
                    if($user['Identifiant'] === $identifiant){

                        if($user['MotDePasse'] === $password){

                            $_SESSION['user'] = $user['Identifiant'];
                            $_SESSION['userfirstname'] = $user['Prenom'];
                            $_SESSION['username'] = $user['Nom'];
                            $_SESSION['sexe'] = $user['Sexe'];
                            $_SESSION['date'] = $user['Date_Naissance'];
                            $_SESSION['mail'] = $user['Mail'];
                            $_SESSION['adresse'] = $user['Adresse'];
                            $_SESSION['code'] = $user['Code'];
                            $variable = $user['Statut'];
                            $_SESSION['statut'] = $user['Statut'];
                            switch ($variable) {
                                case 'etudiant':
                                    header('Location:Etudiant/Etudiant.php');
                                    break;
                                
                                case 'prof':
                                    header('Location:Prof/Prof.php');
                                    break;
                                
                                case 'surveillant':
                                    header('Location:Surveillant/Surveillant.php');
                                    break;
                                
                                default:
                                    
                                    break;
                            }
                            

                        } else header('Location:index.php?login_err=password');
                        
                        $work = 1;
                    }
                }
                if($work != 1){
                    header('Location:index.php?login_err=identifiant');
                }
            }else header('Location:index.php?#');
    } else header('Location:index.php?&'); 
      
?>