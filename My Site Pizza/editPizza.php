<?php
 require ('actions/securityAction.php');
 require ('actions/getPizzaAction.php');
 require ('actions/editPizzaAction.php');
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <? include 'includes/head-admin.php';?>
</head>

<body>
    <? include 'includes/navbar-publishPizza.php';?>

    
    
<h1 style = "margin-top: 8rem; color:green;"> This place only for Admins</h1>

<br><br>
    <div class="container">
        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
        
        <?php 
            if(isset($pizza_prise)){ 
                ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title of Pizza</label>
                        <input type="text" class="form-control" name="title" value="<?= $pizza_title; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Description of Pizza</label>
                        <textarea class="form-control" name="description"><?= $pizza_description; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Prise of Pizza</label>
                        <textarea type="text" class="form-control" name="content"><?= $pizza_prise; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">photo</label>
                        <input type="file" class="form-image" name="picture">
                        <?= '<img src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $pizza_bin ) . '" />'; ?>

                    </div>


                    <button type="submit" class="btn btn-primary" name="validate">Confirm </button>                    
                    <button type="submit" class="btn btn-danger" name="notValidate">Cancel</button>

                </form>
             </div>
                <?php
            }
        ?>
        

   
        
        
    
</body>
</html>