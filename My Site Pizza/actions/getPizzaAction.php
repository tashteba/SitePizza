<?php


require('actions/dataBase.php');

//Making sure if the right admin is l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfPizza = $_GET['id'];

    //Making sure if pizza is already exists.
    $checkIfPizzaExists = $bdd->prepare('SELECT * FROM pizzamenu WHERE id = ?');
    $checkIfPizzaExists->execute(array($idOfPizza));

    if($checkIfPizzaExists->rowCount() > 0){

        //Getting the information of pizza
        $pizzaInfos = $checkIfPizzaExists->fetch();
        if($pizzaInfos['id_auteur'] == $_SESSION['id']){
            
            $pizza_title = $pizzaInfos['Title'];
            $pizza_description = $pizzaInfos['Description'];
            $pizza_bin = $pizzaInfos["bin"];
            $pizza_prise = $pizzaInfos['Prise'];
            

            $pizza_description = str_replace('<br />', '', $pizza_description);
            $pizza_prise = str_replace('<br />', '', $pizza_prise);

        }else{
            $errorMsg = "You are not the good admin for this pizza";
        }

    }else{
        $errorMsg = "There Pizza but we dont found it.";
    }

}else{
    $errorMsg = "There is no Pizza";
}
