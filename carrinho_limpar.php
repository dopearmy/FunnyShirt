<?php
require_once("./application/inc/controllerInit.php");
require_once("./application/models/carrinho.model.php");

limparCarrinho();

if (isset($_SERVER["HTTP_REFERER"])) {
    if (trim($_SERVER["HTTP_REFERER"]) != "") {
        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit;
    }
}
header('Location: index.php');
