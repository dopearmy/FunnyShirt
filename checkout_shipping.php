<?php
require_once("./application/inc/controllerInit.php");

$data = array();
$infoCliente = array();
$msgErros = array();
$dadosSubmetidos = array();

//IDCliente, Nome, NumContribuinte, Telefone, Endereco, DataNascimento, UserID 
$infoCliente = getInfoCliente(getUserInfo()["UserID"]);

//Se não estiver logado redireciona para login.php
if(isUserAnonimo()){
    if (headers_sent()) {
        die("O redirecionamento falhou. Por favor, clique neste link: <a href=login.php>Login</a>");
    }
    else{
        $_SESSION["flash_loginMessage"]="Acesso Negado: Efectue Login para visualizar o conteudo.";
        $_SESSION["flash_loginRedirectTo"]= $_SERVER["REQUEST_URI"];
        exit(header("Location: login.php"));
    }
}

if(!isset($_SESSION['cart'])){
    $_SESSION["flash_loginMessage"]="Acesso Negado: O seu carrinho está vazio";
    $_SESSION["flash_loginRedirectTo"]= $_SERVER["REQUEST_URI"];
    exit(header("Location: carrinho_show.php"));
}


if (empty($_POST)) { // Formulário não foi submetido - é um pedido GET
    if (isset($_SESSION["flash_msgGlobal"])) {
        $msgGlobal = $_SESSION["flash_msgGlobal"];
        unset($_SESSION["flash_msgGlobal"]);
        $tipoMsgGlobal = "S";
    }
}


$tituloPagina = "Finalizar Compra";

require("./application/views/top.template.php");
require("./application/views/checkout_shipping.view.php");
require("./application/views/bottom.template.php");