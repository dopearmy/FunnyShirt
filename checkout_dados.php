<?php
require_once("./application/inc/controllerInit.php");
require_once("./application/models/autenticacao.model.php");
require_once("./application/models/produtos.model.php");
require_once("./application/models/carrinho.model.php");
require_once("./application/models/clientes.moldel.php");
require_once("./application/inc/viewUtils.php");

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


//if (!isUserAluno()) {
//    $_SESSION["flash_loginMessage"] = "Não está autorizado a confirmar a inscrição";
//    $_SESSION["flash_loginRedirectTo"] = $_SERVER["REQUEST_URI"];
//    header("Location: login.php");
//    exit;
//}
//
//$idInscricao = confirmarCarrinho(getNumAluno());
//
//// Experimente subtituir a linha anterior pela próxima.
//// Objetivo - forçar a que ocorra um erro com a operação de confirmarCarrinho 
//// (para perceber o que acontece) 
////	$idInscricao = confirmarCarrinho(getUserId());
//
//if ($idInscricao < 0) {
//    $_SESSION["flash_msgGlobal"] = "Houve um erro ao efetuar a inscrição";
//    $_SESSION["flash_tipoMsgGlobal"] = "E";
//    header('Location: carrinho_show.php');
//    exit;
//} else {
//    $_SESSION["flash_msgGlobal"] = "Inscrição confirmada (ID da inscrição=$idInscricao)";
//    $_SESSION["flash_tipoMsgGlobal"] = "S";
//    header('Location: inscricao_show.php?id=' . $idInscricao);
//    exit;
//}

$tituloPagina = "Finalizar Compra";

require("./application/views/top.template.php");
require("./application/views/checkout_dados.view.php");
require("./application/views/bottom.template.php");