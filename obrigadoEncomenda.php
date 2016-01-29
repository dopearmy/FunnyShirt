<?php
require_once("./application/inc/controllerInit.php");
require_once("./application/models/autenticacao.model.php");
require_once("./application/models/encomendas.model.php");
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

if(!isset($_GET['id'])){
    exit(header("Location: notFound.php"));
}  else {
    $order = getOrderByID($_GET['id'], $idCliente);

    //IDCliente, Nome, NumContribuinte, Telefone, Endereco, DataNascimento, UserID 
    $infoCliente = getInfoCliente($userID);
}



$tituloPagina = "Obrigado pela sua Compra";

require("./application/views/top.template.php");
require("./application/views/obrigadoEncomenda.view.php");
require("./application/views/bottom.template.php");
