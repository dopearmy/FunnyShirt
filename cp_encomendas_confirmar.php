<?php
require_once("./application/inc/controllerInit.php");
require_once("./application/models/encomendas.model.php");


if (isset($_GET['ID'])) {
    confirmOrder((int)$_GET['ID']);
}

if (isset($_SERVER["HTTP_REFERER"])) {
    if (trim($_SERVER["HTTP_REFERER"]) != "") {
        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit;
    }
}
header('Location: cp_encomendas.php');
