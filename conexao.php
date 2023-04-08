<?php
include_once('helpers/funcao.php');
session_start();
$_SESSION['conexao'] = mysqli_connect("localhost","root","","rpg");
$con = mysqli_connect("localhost","root","","rpg");

log_erro_ALL();
?>