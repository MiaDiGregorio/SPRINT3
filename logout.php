<?php
session_start();
if (empty($_SESSION["email"])){
    header('Location: login.php');
}else{
    session_destroy();
    header('Location: index.php');
}
?>