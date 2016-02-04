<?php
require_once("./application/inc/controllerInit.php");

if($_SESSION['UserInfo']['UserID'] == $_GET['ID']){
    $msgGlobal = "Impossivel desativar-se a si Próprio!";
    $_SESSION["flash_msgGlobal"] = $msgGlobal;
    $tipoMsgGlobal = "E";
    $_SESSION["tipoMsgGlobal"] = $tipoMsgGlobal;
    header('Location: cp_utilizadores.php');
    exit();
}
    
if (isset($_GET['ID'])) {
    estadoUser((int)$_GET['ID'], (int)$_GET['estado']);

}

if (isset($_SERVER["HTTP_REFERER"])) {
    if (trim($_SERVER["HTTP_REFERER"]) != "") {
        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit;
    }
}
header('Location: cp_utilizadores.php');
