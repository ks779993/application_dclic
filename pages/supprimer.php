<?php 
//connexion à la base de donné
require_once "connexion.php";
//recuperation de l'id dans le liens
$id= $_GET['id'];
//requette de suppression
$req = mysqli_query($con , "DELETE FROM employe WHERE id = $id");
//redirection vers la page index.php
header("location:../index.php")





?>