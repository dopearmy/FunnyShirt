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
$pagamento = "";
$pagamentoErro = "";


//IDCliente, Nome, NumContribuinte, Telefone, Endereco, DataNascimento, UserID 
$infoCliente = getInfoCliente(getUserInfo()["UserID"]);

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

if(!isset($_SESSION['cart'])){
    $_SESSION["flash_loginMessage"]="Acesso Negado: O seu carrinho está vazio";
    $_SESSION["flash_loginRedirectTo"]= $_SERVER["REQUEST_URI"];
    exit(header("Location: carrinho_show.php"));
}

if (empty($_GET)) { // Formulário não foi submetido - é um pedido GET
    if (isset($_SESSION["flash_msgGlobal"])) {
        $msgGlobal = $_SESSION["flash_msgGlobal"];
        unset($_SESSION["flash_msgGlobal"]);
        $tipoMsgGlobal = "S";
    }
} else if (!empty($_GET)) { // Formulário foi submetido - é um pedido POST
    $dadosSubmetidos = true;
    $data = $_GET;
    if (isset($_GET['pagamento']) == "checked") {
        //$nome, $nContribuinte, $telefone, $morada, $dataNasc
        $msgErros = validarVisa($data['visa']);
        if (count($msgErros) > 0) {
            $msgGlobal = "Existem valores inválidos no número visa";
            $tipoMsgGlobal = "E";
        }
    } else {
        $msgGlobal = "Selecione uma opção de pagamento";
        $tipoMsgGlobal = "E";
    }
}


$tituloPagina = "Finalizar Compra";

require("./application/views/top.template.php");
require("./application/views/checkout_pagamento.view.php");
require("./application/views/bottom.template.php");
