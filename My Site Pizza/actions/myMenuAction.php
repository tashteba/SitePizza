<?php 

require ('actions/dataBase.php');

$getAllMyMenu = $bdd->prepare('SELECT id, Title, bin, Prise, Description FROM pizzamenu WHERE id_auteur = ? ORDER BY id DESC');
$getAllMyMenu->execute(array($_SESSION['id']));

