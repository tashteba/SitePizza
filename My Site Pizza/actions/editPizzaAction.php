<?php


require('actions/dataBase.php');

//Making sure if admin is clicked on button.
if(isset($_POST['validate'])){

    //Making sure if all fields are valid.
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){

        //new veriables after edit.
        $new_pizza_title = htmlspecialchars($_POST['title']);
        $new_pizza_description = nl2br(htmlspecialchars($_POST['description']));
        $new_pizza_prise = nl2br(htmlspecialchars($_POST['content']));
        $new_pizza_image = file_get_contents($_FILES['picture']['tmp_name']);

        
        //Update all fields with the new information.
        $editPizzaOnWebsite = $bdd->prepare('UPDATE pizzamenu SET Title = ?, Description = ?, Prise = ?, bin = ? WHERE id = ?');
        $editPizzaOnWebsite->execute(array($new_pizza_title, $new_pizza_description, $new_pizza_prise, $new_pizza_image, $idOfPizza));

        //send request to myMenu for  My new Menu.
        header('Location: myMenu.php');

    }else{
        $errorMsg = "Complete all fields Please...";
    }

}
if(isset($_POST['notValidate'])){
    header('Location : ./myMenu.php');
}