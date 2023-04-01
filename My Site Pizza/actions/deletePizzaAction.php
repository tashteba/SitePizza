<?php

session_start();
if(!isset($_SESSION['auth'])){
    header('Location : ../login.php');
}

require('dataBase.php');

// Making sure if id is existe and not empty.
if(isset($_GET['id']) && !empty($_GET['id'])){
    
    // Getting the id of Pizza.
    $idOfPizza = $_GET['id'];

    // Making sure if pizza is existe.
    $checkIfPizzaExists = $bdd->prepare('SELECT id_auteur FROM pizzamenu WHERE id = ?');
    $checkIfPizzaExists->execute(array($idOfPizza));

    if($checkIfPizzaExists->rowCount() > 0){

        // Getting the inforamation of the pizza
        $PizzaInfos = $checkIfPizzaExists->fetch();
        if($PizzaInfos['id_auteur'] == $_SESSION['id']){

            // Delete the Pizza wich have the same id
            $deleteThisPizza = $bdd->prepare('DELETE FROM pizzamenu WHERE id = ?');
            $deleteThisPizza->execute(array($idOfPizza));

            // Sending request for menu of pizza
            header('Location: ../myMenu.php');

        } else {
            echo "You don't have the right for delete this Pizza !";
        }

    } else {
        echo "There is no pizza for delete it";
    }

} else {
    echo "There is no pizza for delete it";
}