<?php
session_start();
require('actions/dataBase.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Make sure if admin complete the fields.
    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){
        
        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);

        //Make sure if pseudo is correct and existe.
        $checkIfUserExists = $bdd->prepare('SELECT * FROM admins WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount() > 0){
            
            //Getting data from database.
            $usersInfos = $checkIfUserExists->fetch();

            //Make sure if password is coorect.
            if(password_verify($user_password, $usersInfos['password'])){
            
                //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['lastname'];
                $_SESSION['firstname'] = $usersInfos['firstname'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];

                //Rediriger l'utilisateur vers la page d'accueil
                header('Location:myMenu.php');
    
            }else{
                $errorMsg = "Password is not correct...";
            }

        }else{
            $errorMsg = "Your pseudo is not correct...";
        }

    }else{
        $errorMsg = "Please Complete all feilds...";
    }

}