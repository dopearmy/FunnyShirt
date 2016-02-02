<?php
require_once("./application/inc/controllerInit.php");
require_once("./application/models/encomendas.model.php");


//apagarOrder((int)$_GET['ID']);


//if (isset($_GET['ID'])) {
//    apagarOrder($_GET['ID']);
//}

if (isset($_SERVER["HTTP_REFERER"])) {
    if (trim($_SERVER["HTTP_REFERER"]) != "") {
        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit;
    }
}
header('Location: cp_encomendas.php');
