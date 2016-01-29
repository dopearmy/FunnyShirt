<?php

require_once("./application/inc/controllerInit.php");
require_once("./application/models/autenticacao.model.php");
require_once("./application/models/produtos.model.php");
require_once("./application/models/carrinho.model.php");
require_once("./application/models/clientes.moldel.php");
require_once("./application/inc/viewUtils.php");

$infoCliente = array();
$msgErros = array();
$dadosSubmetidos = false;
$userID = getUserInfo()["UserID"];
$idCliente = getInfoCliente($userID)[0]['IDCliente'];
$total = $totalCarrinho;
$numVisa = 0;
$endereco = "";
$entregue = 0;


//IDCliente, Nome, NumContribuinte, Telefone, Endereco, DataNascimento, UserID 
$infoCliente = getInfoCliente($userID);

//Se não estiver logado redireciona para login.php
if (isUserAnonimo()) {
    if (headers_sent()) {
        die("O redirecionamento falhou. Por favor, clique neste link: <a href=login.php>Login</a>");
    } else {
        $_SESSION["flash_loginMessage"] = "Acesso Negado: Efectue Login para visualizar o conteudo.";
        $_SESSION["flash_loginRedirectTo"] = $_SERVER["REQUEST_URI"];
        exit(header("Location: login.php"));
    }
}

if (!isset($_SESSION['cart'])) {
    $_SESSION["flash_loginMessage"] = "Acesso Negado: O seu carrinho está vazio";
    $_SESSION["flash_loginRedirectTo"] = $_SERVER["REQUEST_URI"];
    exit(header("Location: carrinho_show.php"));
}

if (isset($_SESSION["flash_msgGlobal"])) {
    $msgGlobal = $_SESSION["flash_msgGlobal"];
    unset($_SESSION["flash_msgGlobal"]);
    $tipoMsgGlobal = $_SESSION["flash_tipoMsgGlobal"];
}

if (!isset($_GET['visa']) || !isset($_GET['pagamento'])) {
    $_SESSION["flash_msgGlobal"] = "Selecione o metodo de pagamento";
    $_SESSION["flash_tipoMsgGlobal"] = "E";
    header('Location: checkout_pagamento.php');
}

if (!empty($_POST)) {
    $endereco = getInfoCliente($userID)[0]['Endereco'];
    $linhaEncomenda = $_SESSION['cart'];
    
    if(isset($_GET)){
        $numVisa = $_GET['visa'];
    }  else {
        $numVisa = "";
    }
    $IdEncomenda = confirmarCarrinho(getInfoCliente($userID)[0]['IDCliente'], $numVisa, $endereco, $linhaEncomenda);
    // Experimente subtituir a linha anterior pela próxima.
    // Objetivo - forçar a que ocorra um erro com a operação de confirmarCarrinho 
    // (para perceber o que acontece) 
    // $IdEncomenda = confirmarCarrinho(getUserId());
    if ($IdEncomenda < 0) {
        $_SESSION["flash_msgGlobal"] = "Houve um erro ao efetuar a encomenda";
        $_SESSION["flash_tipoMsgGlobal"] = "E";
        header('Location: checkout_finalizar.php');
    } else {
        $_SESSION["flash_msgGlobal"] = "Encomenda confirmada (ID da encomenda=$IdEncomenda)";
        $_SESSION["flash_tipoMsgGlobal"] = "S";
        header('Location: obrigadoEncomenda.php?id=' . $IdEncomenda);
        
    }
}


$tituloPagina = "Finalizar Compra";

require("./application/views/top.template.php");
require("./application/views/checkout_finalizar.view.php");
require("./application/views/bottom.template.php");
