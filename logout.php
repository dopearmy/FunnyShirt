<?php 
    session_start();
    unset($_SESSION['UserInfo']);
    setcookie("tshirtshop", "tsmicaelmatiasCookie", time() - 3600, "/");
    header('Location: index.php');