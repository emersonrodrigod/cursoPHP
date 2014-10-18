<?php

session_start();

if ($_SESSION['logado'] != true) {
    header("location:index.php");
}

session_regenerate_id();
