<?php
require_once("./application/inc/controllerInit.php");

if (isset($_GET['ID'])) {
    apagarProduto($_GET['ID']);
}

if (isset($_SERVER["HTTP_REFERER"])) {
    if (trim($_SERVER["HTTP_REFERER"]) != "") {
        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit;
    }
}
header('Location: cp_produtos.php');
