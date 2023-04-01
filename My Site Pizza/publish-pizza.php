<?php require('actions/securityAction.php'); ?>
<?php require("actions/publish-pizzaAction.php"); ?>

<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>



<?php include 'includes/head.php'; ?>
<body>
<?php include 'includes/navbar.php'; ?>

<h1 style = "margin-top: 8rem; color:green;"> This place only for Admins</h1>
<form class="container" method="POST" enctype="multipart/form-data">

    <?php 
        if(isset($errorMsg)){ 
            echo '<p>'.$errorMsg.'</p>'; 
        }elseif(isset($successMsg)){ 
            echo '<p>'.$successMsg.'</p>'; 
        }
    ?>

    <div class="mb-3" style = "margin-top: 4rem;">
        <label for="exampleInputEmail1" class="form-label">Title of Pizza</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Description of Pizza</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Prise of Pizza</label>
        <textarea type="text" class="form-control" name="content"></textarea>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">photo</label>
        <input type="file" class="form-image" name="picture">
    </div>

    <button type="submit" class="btn btn-primary" name="validate">Publish Pizza</button>
</form>

</body>
</html>