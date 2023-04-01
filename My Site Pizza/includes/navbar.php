
    <header class="head">
        <h1>Pizza<i class ="fas fa-pizza-slice"></i></h1>
        <?php 
        if(isset($_SESSION['auth'])){
            ?>
            <nav class = "navbar">
            <a href="index.php">Home</a>
            <a href="publish-pizza.php">Share New Pizza</a>
            <a href="indexOfToday2.php">My Menu Pizza for Today</a>
            <a href="actions/logoutAction.php">Sign Out</a>
            
        </nav>
        <div class="side-bar">
            <i class = "fas fa-search" id="search"></i>
            <a href="signup.php"><i class = 'fas fa-user' id="user" ></i></a>
            <i class = 'fas fa-bars' id="bars"></i>
        </div>
        <form action="#" class = "search-bar" >
            <input type="search" name ="search" id ="1" placeholder="Search Here">
        </form>
        <?php

        }else{
            ?>
            <nav class = "navbar">
            <a href="index.php">Home</a>
            <a href="index.php#about">About</a>
            <a href="index.php#service">Services</a>
            <a href="index.php#menu">Menu</a>
            <a href="index.php#blog">Blog</a>
            <a href="index.php#contact">Contact</a>
        </nav>
        <div class="side-bar">
            <i class = "fas fa-search" id="search"></i>
            <a href="signup.php"><i class = 'fas fa-user' id="user" ></i></a>
            <i class = 'fas fa-bars' id="bars"></i>
        </div>
        <form action="#" class = "search-bar" >
            <input type="search" name ="search" id ="1" placeholder="Search Here">
        </form>
        <?php


        }

        ?>
        
        

    </header>

    