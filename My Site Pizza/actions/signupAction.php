<?php
session_start();
require('actions/dataBase.php');

if(isset($_POST['validate'])){

    
        //Making sure if admin is complete all the require fields.
    if(!empty($_POST['pseudo']) &&! empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['password'])){
        // Data of admin
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
               
        //Making sure if admin is already enable.

        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM admins WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if ($checkIfUserAlreadyExists->rowCount() == 0){

            // Entry data into dataBase table.
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO admins (pseudo, lastname, firstname, password) VALUES(?,?,?,?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

            // Getting admin informations.
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, lastname, firstname FROM admins WHERE pseudo = ? AND firstname = ? '); 
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));

            $adminsInfos = $getInfosOfThisUserReq->fetch();
            // Authenticate the admin in the site web.    
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $adminsInfos['id'];
            $_SESSION['lastanme'] = $adminsInfos['lastname'];
            $_SESSION['firstname'] = $adminsInfos['firstname'];
            $_SESSION['pseudo'] = $adminsInfos['pseudo'];

            
            header('Location: indexAdmin.php');


        }else{
            $errorMsg = 'You Already have acount !';
        }


    }else{
        $errorMsg = 'Please Complete All fields !';
    }
}