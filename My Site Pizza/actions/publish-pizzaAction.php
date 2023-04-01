<?php 

require('actions/dataBase.php');

//Making sure if admin clicked on button.
if(isset($_POST['validate'])){

    //Making sure if all fields are completely validated.
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        
        //Les données de la question
        $pizza_title = htmlspecialchars($_POST['title']);
        $pizza_description = nl2br(htmlspecialchars($_POST['description']));
        $pizza_content = nl2br(htmlspecialchars($_POST['content']));
        $pizza_image = file_get_contents($_FILES['picture']['tmp_name']);
        $pizza_date = date('d/m/Y');
        $pizza_id_author = $_SESSION['id'];
        $pizza_pseudo_author = $_SESSION['pseudo'];
  //Insérer laquestion sur la question
        $insertPizzaOnWebsite = $bdd->prepare('INSERT INTO pizzamenu(Title, Description, Prise, bin, id_auteur, pseudo_auteur, Date_publication)VALUES(?, ?, ?, ?, ?, ?, ?)');
        $insertPizzaOnWebsite->execute(
            array(
                $pizza_title, 
                $pizza_description, 
                $pizza_content,
                $pizza_image, 
                $pizza_id_author, 
                $pizza_pseudo_author, 
                $pizza_date
            )
        );
        
        $successMsg = "Your Pizzza is now available !";
        
    }else{
        $errorMsg = "Please Complete all Fields...";
    }

}