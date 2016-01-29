<?php
session_start();
// Inicialização de variáveis em todos os controladores 
require_once("./application/models/carrinho.model.php");
require_once("./application/models/produtos.model.php");
require_once("./application/models/clientes.moldel.php");
require_once("./application/models/autenticacao.model.php");
require_once("./application/inc/viewUtils.php");


$infoCart = getCarrinho();
//$totalQTD = getTotalQuantidadesCarrinho();
$totalCarrinho = getTotalCarrinho();
