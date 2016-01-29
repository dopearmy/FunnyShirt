<?php
require_once("./application/inc/controllerInit.php");


if (isset($_GET['ID']))
    $produtoID = $_GET['ID'];

if (!isset($produtoID)) {
    exit(header("Location: notFound.php"));
}


//Devolve info produtos pelo id do produto
$produtos = getInfoProdutoID($produtoID);

//Lista de produtos Encurtada
$produtosRelacionados = getProdutosRelacionados();


// Variáveis usadas pelo do template
$tituloPagina = "Detalhes do Produto";

require("./application/views/top.template.php");
require("./application/views/produtoModel.view.php");
require("./application/views/tamanhosModel.view.php");
require("./application/views/produtoDetalhes.view.php");
require("./application/views/bottom.template.php");
