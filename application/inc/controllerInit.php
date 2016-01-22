<?php

session_start();
// Inicialização de variáveis em todos os controladores 
require_once("./application/models/carrinho.model.php");
require_once("./application/models/produtos.model.php");

$infoCart = getCarrinho();
//$totalQTD = getTotalQuantidadesCarrinho();
$totalCarrinho = getTotalCarrinho();
//   $listaProdutos = getListOfCursos();
