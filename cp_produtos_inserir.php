<?php
require_once("./application/inc/controllerInit.php");

$page = "cp_produtos.php";
$clientes = array();

$data = array();
$infoCliente = array();
$tipoUser = "";

$data = null;

$msgErros = array();
$dadosSubmetidos = false;

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

if (empty($_POST)) { // Formulário não foi submetido - é um pedido GET
    if (isset($_SESSION["flash_msgGlobal"])) {
        $msgGlobal = $_SESSION["flash_msgGlobal"];
        unset($_SESSION["flash_msgGlobal"]);
        $tipoMsgGlobal = "S";
    }
}

if (empty($_POST)) { // Formulário não foi submetido - é um pedido GET
    $data = NULL;
    
} else if (!empty($_POST)) { // Formulário foi submetido - é um pedido POST
    $dadosSubmetidos = true;
    $data = $_POST;
    //$nome, $nContribuinte, $telefone, $morada, $dataNasc
    $msgErros = validarDadosProdutos($data["nome"], $data["preco"]);
    if (count($msgErros) > 0) {
        $msgGlobal = "Existem valores inválidos no formulário";
        $tipoMsgGlobal = "A";
    } 
}

$produtos = getInfoProduto();
$totalProduto = count($produtos) + 1;

// Variáveis usadas pelo do template
$tituloPagina = "Editar Produtos";

require("./application/views/admin/top.template.php");
require("./application/views/admin/cp_produtos_inserir.view.php");
require("./application/views/admin/bottom.template.php");
