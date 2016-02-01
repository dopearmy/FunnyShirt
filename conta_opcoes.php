<?php
require_once("./application/inc/controllerInit.php");


// Variáveis usadas pelo do template
$tituloPagina = "Editar Conta";
$data = array();
$infoCliente = array();
$tipoUser = "";


$data = null;

//IDCliente, Nome, NumContribuinte, Telefone, Endereco, DataNascimento, UserID 
$infoCliente = getInfoCliente(getUserInfo()["UserID"]);

$infoUser = getInfoUserByID(getUserInfo()["UserID"]);

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
    if (isset($_GET["ID"])) {
        if(isUserCliente()){
            $data = getInfoCliente(getUserInfo()["UserID"]);
        }elseif (isUserAdmin()) {
            $data = getInfoUserByID(getUserInfo()["UserID"]);
        }elseif (isUserAdmin()) {
            $data = getInfoUserByID(getUserInfo()["UserID"]);
        }elseif (isUserFuncionario()) {
            $data = getInfoUserByID(getUserInfo()["UserID"]);
        }

    }
    if ($data == NULL || empty($_GET["ID"])) {
        header("Location: notFound.php");
        exit;
    }
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
            header("Location: conta_opcoes.php?ID=".getUserInfo()["UserID"]);
            exit;
        } else {
            $msgGlobal = "Houve um problema ao alterar os dados";
            $tipoMsgGlobal = "E";
        }
    }
}

//Alterar Senha
$msgErros = array();
$dadosSubmetidos = false;
if (!empty($_POST)) { // Formulário foi submetido - é um pedido POST
    $dadosSubmetidos = true;
    $data = $_POST;
    $msgErros = validarChangePassword($data["senhaAtual"], $data["novaSenha1"], $data["novaSenha2"]);
    if (count($msgErros) > 0) {
        $msgGlobal = "Existem valores inválidos no formulário";
        $_SESSION["flash_msgGlobal"] = $msgGlobal;
        $tipoMsgGlobal = "A";
    } else {
        if (!verificarSenha(getUserInfo()["UserID"], $data["senhaAtual"])) {
            $msgGlobal = "Senha atual/antiga está incorreta";
            $_SESSION["flash_msgGlobal"] = $msgGlobal;
            $tipoMsgGlobal = "E";
        } else {
            if (alterarSenha(getUserInfo()["UserID"], $data["novaSenha1"])) {
                $msgGlobal = "Senha alterada com sucesso";
                $_SESSION["flash_msgGlobal"] = $msgGlobal;
                $tipoMsgGlobal = "S";
                $_SESSION["tipoMsgGlobal"] = $tipoMsgGlobal;
                $data = array();
            } else {
                $msgGlobal = "Ocorreu um erro ao alterar a senha";
                $_SESSION["flash_msgGlobal"] = $msgGlobal;
                $tipoMsgGlobal = "E";
            }
        }
    }
}



require("./application/views/top.template.php");
require("./application/views/conta_opcoes.view.php");
require("./application/views/bottom.template.php");
