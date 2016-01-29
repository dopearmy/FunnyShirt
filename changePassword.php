<?php
require_once("./application/inc/controllerInit.php");

// Variáveis usadas pelo do template
$tituloPagina = "Editar Conta";
$data = array();
$infoCliente = array();
$msgErros = array();
$dadosSubmetidos = false;
$tipoMsgGlobal = "E";

$IDCliente = 0;
$nome = "";
$preco = 0;
$dataEntrada = 0;

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
        $tipoMsgGlobal = "E";
        header("Location: opcoesConta.php?ID=".getUserInfo()["UserID"]);
    } else {
        if (!verificarSenha(getUserInfo()["UserID"], $data["senhaAtual"])) {
            $msgGlobal = "Senha atualantiga está incorreta";
            $_SESSION["flash_msgGlobal"] = $msgGlobal;
            $tipoMsgGlobal = "E";
            
            header("Location: opcoesConta.php?ID=".getUserInfo()["UserID"]);
        } else {
            if (alterarSenha(getUserInfo()["UserID"], $data["novaSenha1"])) {
                $msgGlobal = "Senha alterada com sucesso";
                $_SESSION["flash_msgGlobal"] = $msgGlobal;
                $tipoMsgGlobal = "S";
                $data = array();
                header("Location: opcoesConta.php?ID=".getUserInfo()["UserID"]);
            } else {
                $msgGlobal = "Ocorreu um erro ao alterar a senha";
                $_SESSION["flash_msgGlobal"] = $msgGlobal;
                $tipoMsgGlobal = "E";
            }
        }
    }
}


require("./application/views/top.template.php");
require("./application/views/opcoesConta.view.php");
require("./application/views/bottom.template.php");