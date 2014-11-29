<?php
session_start();

if(!$_SESSION['logado'] == true){
    header("location:login.php");
}

?>