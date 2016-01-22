<?php
require_once("./application/inc/controllerInit.php");
require_once("./application/models/autenticacao.model.php");
require_once("./application/models/produtos.model.php");
require_once("./application/models/carrinho.model.php");


// Variáveis usadas pelo do template
$tituloPagina = "Contatos";

require("./application/views/top.template.php");
require("./application/views/contatos.view.php");
require("./application/views/bottom.template.php");
