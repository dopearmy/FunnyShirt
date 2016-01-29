<?php
require_once("./application/inc/controllerInit.php");

if (isset($_GET["idProduto"])) {
    removerLinhaCarrinho($_GET["idProduto"]);
}

if (isset($_SERVER["HTTP_REFERER"])) {
    if (trim($_SERVER["HTTP_REFERER"]) != "") {
        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit;
    }
}
header('Location: index.php');


