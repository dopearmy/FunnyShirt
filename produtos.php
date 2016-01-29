<?php
require_once("./application/inc/controllerInit.php");

$orderby = 0;
$calcTotalProdutos = 0;
$produtoID = 0;
$nome = "";
$preco = 0;
$dataEntrada = 0;
$produtosPorPagina = 10;
$total = 0;
$subTotal = 0;

if (isset($_GET['ID']))
    $produtoID = $_GET['ID'];

if (isset($_GET['Nome']))
    $nome = $_GET['Nome'];

if (isset($_GET['Preco']))
    $preco = $_GET['Preco'];

if (isset($_GET['DataEntrada']))
    $dataEntrada = $_GET['DataEntrada'];


//Total de produtos (COUNT(*))
$calcTotalProdutos = getCountProdutos();

foreach ($calcTotalProdutos as $value) {
    $countProdutos = $value;
}


//Devolve a info dos produtos
$produtos = getInfoProduto();


// Variáveis usadas pelo do template
$tituloPagina = "Produtos";

require("./application/views/top.template.php");
require("./application/views/produtoModel.view.php");
require("./application/views/produtos.view.php");
require("./application/views/bottom.template.php");
