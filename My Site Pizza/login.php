<?php require("actions/loginAction.php"); ?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<?php include 'includes/head.php'; ?>
<body style = 'color:#d5ab65; font-size:1.5rem;'>
    
    <br><br>
    <form class="container" method="POST"  style = "background: url(assets/photos/coverMyMenu.jpg);background-size: cover;">

        <?php if(isset($errorMsg)){ echo '<p style = color:red;>'.$errorMsg.'</p>'; } ?>
        <div class='mb-3'>
            <label for='exampleInputEmail1' class='form-label'>Pseudo</label>
            <input type='text' class='form-control' name='pseudo'>
        </div>
        <div class='mb-3'>
            <label for='exampleInputPassword1' class='form-label'>Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Connect</button>
        <br><br>
        <a href="signup.php"><p>I don't have acount, I want to</p></a>
    </form>

</body>

</html>