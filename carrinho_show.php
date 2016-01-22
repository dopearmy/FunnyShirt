<?php
require_once("./application/inc/controllerInit.php");
require_once("./application/models/autenticacao.model.php");
require_once("./application/models/produtos.model.php");
require_once("./application/models/carrinho.model.php");

// Variáveis que vêm na Sessão
if (isset($_SESSION["flash_msgGlobal"])) {
    $msgGlobal = $_SESSION["flash_msgGlobal"];
    unset($_SESSION["flash_msgGlobal"]);
}
if (isset($_SESSION["flash_tipoMsgGlobal"])) {
    $tipoMsgGlobal = $_SESSION["flash_tipoMsgGlobal"];
    unset($_SESSION["flash_tipoMsgGlobal"]);
}

//$carrinho = obtemDisciplinasCarrinho();

// Variáveis usadas pelo do template
$tituloPagina = "Carrinho";

require("./application/views/top.template.php");
require("./application/views/carrinho.view.php");
require("./application/views/bottom.template.php");

