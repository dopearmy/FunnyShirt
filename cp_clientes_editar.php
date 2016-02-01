<?php
require_once("./application/inc/controllerInit.php");

$page = "cp_clientes.php";
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
    if (isset($_SESSION['UserInfo'])){
        if($_SESSION['UserInfo']['TipoUser'] == "G"){
            $tipoUser = "Gestor";
        } elseif ($_SESSION['UserInfo']['TipoUser'] == "C"){
            $tipoUser = "Cliente";
        } elseif ($_SESSION['UserInfo']['TipoUser'] == "F") {
            $tipoUser = "Funcionário";
        }
    }
}

if (empty($_POST)) { // Formulário não foi submetido - é um pedido GET
    $data = NULL;
    
    
} else if (!empty($_POST)) { // Formulário foi submetido - é um pedido POST
    $dadosSubmetidos = true;
    $data = $_POST;
    //$nome, $nContribuinte, $telefone, $morada, $dataNasc
    $msgErros = validarDadosCliente($data["nome"], $data["contribuinte"], $data["telefone"], $data["endereco"], $data["dataNasc"]);
    if (count($msgErros) > 0) {
        $msgGlobal = "Existem valores inválidos no formulário";
        $tipoMsgGlobal = "A";
    } else {
        //$id, $nome, $nContribuinte, $telefone, $morada, $dataNasc
        if (alterarDadosCliente(getUserInfo()["UserID"], $data["nome"], $data["contribuinte"], $data["telefone"], $data["endereco"], date_format($dataNasc, 'Y-m-d H:i:s'))) {
            $_SESSION["flash_msgGlobal"] = "Os dados foram alterados com sucesso";
            $_SESSION["flash_tipoMsgGlobal"] = "S";
            header("Location:".$_SERVER['PHP_SELF']."?ID=".getUserInfo()["UserID"]);
            exit;
        } else {
            $msgGlobal = "Houve um problema ao alterar os dados";
            $tipoMsgGlobal = "E";
        }
    }
}

$clientes = getInfoClienteByClienteID($_GET['ID']);

// Variáveis usadas pelo do template
$tituloPagina = "Editar Cliente";

require("./application/views/admin/top.template.php");
require("./application/views/admin/cp_clientes_editar.view.php");
require("./application/views/admin/bottom.template.php");
