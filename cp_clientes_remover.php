<?php
require_once("./application/inc/controllerInit.php");

var_dump($_GET);

if (isset($_GET['ID'])) {
    apagarCliente($_GET['ID']);
}

if (isset($_SERVER["HTTP_REFERER"])) {
    if (trim($_SERVER["HTTP_REFERER"]) != "") {
        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit;
    }
}
header('Location: cp_clientes.php');
