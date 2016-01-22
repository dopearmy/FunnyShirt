<?php
require_once("./application/inc/controllerInit.php");
require_once("./application/models/autenticacao.model.php");
require_once("./application/models/produtos.model.php");
require_once("./application/models/carrinho.model.php");

$orderby = 0;
$arrayProdutos = 0;
$calcTotalProdutos = getCountProdutos();
$produtoID = 0;
$nome = "";
$preco = 0;
$dataEntrada = 0;


if (isset($_GET['ID']))
        $produtoID = $_GET['ID'];

if (isset($_GET['Nome']))
        $nome = $_GET['Nome'];

if (isset($_GET['Preco']))
        $preco = $_GET['Preco'];

if (isset($_GET['DataEntrada']))
        $dataEntrada = $_GET['DataEntrada'];


//Total de produtos (COUNT(*))
foreach ($calcTotalProdutos as $value){
    $countProdutos = $value;
}

$produtos = getInfoProduto();

$produtosRelacionados = getProdutosRelacionados();


// Variáveis usadas pelo do template
$tituloPagina = "Página Inicial";

require("./application/views/top.template.php");
require("./application/views/produtoModel.view.php");
require("./application/views/index.view.php");
require("./application/views/bottom.template.php");
