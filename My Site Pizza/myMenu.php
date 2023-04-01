<?php 
    session_start();
    require('actions/myMenuAction.php'); 
   
?>
<!DOCTYPE html>
<html lang="en">


<?php include 'includes/head.php'; ?>
<body>
    
    <?php include 'includes/navbar.php'; ?>
    <h1 style = "margin-top: 18rem;"> Here Menu of today</h1>
    <section class="menu" id="menu">
    <div class="menu-content">
        <?php  
            while($pizza = $getAllMyMenu->fetch())
            {
                ?>
    
        <div class="in-box">
            <i class= "far fa-heart"></i>
            <?= '<img src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $pizza['bin'] ) . '" />'; ?>
            <div class="in-content">
                <div class="star">
                    <i class ="fas fa-star"></i>
                    <i class ="fas fa-star"></i>
                    <i class ="fas fa-star"></i>
                    <i class ="fas fa-star"></i>
                    <i class ="fas fa-star"></i>
                    <h2> <?= $pizza['Title'];?></h2>
                    <div><p style = "font-size:1.5rem; color:red;"><?= $pizza['Description'];?></p></div>
                    <div class="price"><?= $pizza['Prise'];?> €</div>
                    </div>
                    </div>
                    <?php
                    if(isset($_SESSION['auth'])){
                        ?>
                        <div class="inSide">
                        <button class = 'btn'><a href="article.php?id=<?= $question['id']; ?>">See my pizza</a></button>
                        <button class = 'btn'><a href="editPizza.php?id=<?= $pizza['id']; ?>">edit my pizza</a></button>
                        <button class = 'btn'><a href="actions/deletePizzaAction.php?id=<?= $pizza['id']; ?>" >delete my pizza</a></button>
                        </div>
                        <?php
                    }
                    ?>
                    
                    
                
           
        </div>
       
    
               
                <?php
            }

        ?>
        </div>

</section>

<script type="text/javascript" src="assets/myJavaScript.js"></script>

</body>
</html>