<?php
require_once("./application/inc/controllerInit.php");

// Variáveis usadas pelo do template
$tituloPagina = "Editar Conta";
$data = array();
$infoCliente = array();
$msgErros = array();
$dadosSubmetidos = false;

$IDCliente = 0;
$nome = "";
$preco = 0;
$dataEntrada = 0;
$tipoUser = "";

$infoUser = getInfoUserByID(getUserInfo()["UserID"]);

var_dump($infoUser);
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
    if (isset($_GET["ID"]))
        $data = $infoUser;
    if ($data == NULL || empty($_GET["ID"])) {
        header("Location: notFound.php");
        exit;
    }
} else if (!empty($_POST)) { // Formulário foi submetido - é um pedido POST
    $dadosSubmetidos = true;
    $data = $_POST;
    //($username, $email, $estadoConta)
    $msgErros = validarDadosUser($data["username"], $data["email"], $data["estadoConta"]);
    if (count($msgErros) > 0) {
        $msgGlobal = "Existem valores inválidos no formulário";
        $tipoMsgGlobal = "A";
    } else {
        //$id, $nome, $nContribuinte, $telefone, $morada, $dataNasc
        
        $dataNasc = $data["dataNasc"];
        if (alterarDadosUser(getUserInfo()["UserID"], $data["username"], $data["email"], $data["estadoConta"])) {
            $_SESSION["flash_msgGlobal"] = "Os dados foram alterados com sucesso";
            $_SESSION["flash_tipoMsgGlobal"] = "S";
            $tipoMsgGlobal = "S";
            header("Location: conta_opcoes.php?ID=".getUserInfo()["UserID"]);
            exit;
        } else {
            $msgGlobal = "Houve um problema ao alterar os dados";
            $tipoMsgGlobal = "E";
        }
    }
}




require("./application/views/top.template.php");
require("./application/views/conta_opcoes.view.php");
require("./application/views/bottom.template.php");
