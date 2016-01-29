<?php
require_once("./application/inc/controllerInit.php");

//Se estiver logado redireciona para conta.php
if (!isUserAnonimo()) {
    if (headers_sent()) {
        die("O redirecionamento falhou. Por favor, clique neste link: <a href=login.php>Login</a>");
    } else {
        $_SESSION["flash_loginRedirectTo"] = $_SERVER["REQUEST_URI"];
        exit(header("Location: conta.php"));
    }
}

// Iniciação das variáveis obrigatórios na vista:
$tituloPagina = "Login";
$data = array();
$data["redirectTo"] = "";
$msgErros = array();
$dadosSubmetidos = false;


//Manter sessão iniciada
$hour = time() + 3600;
$rememberMe = isset($_POST["rememberMe"]) ? true : false;

if ($rememberMe == true) {
    setcookie("tshirtshop", "tsmicaelmatiasCookie", $hour, "/");
}

if (empty($_POST)) { // Formulário não foi submetido - é um pedido GET
    if (isset($_SESSION["flash_loginRedirectTo"])) {
        $data["redirectTo"] = $_SESSION["flash_loginRedirectTo"];
        unset($_SESSION["flash_loginRedirectTo"]);
    }
    if (isset($_SESSION["flash_loginMessage"])) {
        $msgGlobal = $_SESSION["flash_loginMessage"];
        unset($_SESSION["flash_loginMessage"]);
        $tipoMsgGlobal = "E";
    }
} else
if (!empty($_POST)) { // Formulário foi submetido - é um pedido POST
    $dadosSubmetidos = true;
    $data = $_POST;
    $msgErros = validarLogin($data["username"], $data["senha"]);
    if (count($msgErros) > 0) {
        $msgGlobal = "Existem valores inválidos no formulário";
        $tipoMsgGlobal = "A";
    } else {
        $userInfo = getUserInfoFromCredenciais($data["username"], $data["senha"]);
        if ($userInfo == null) {
            $msgGlobal = "Credenciais Inválidas";
            $tipoMsgGlobal = "E";
        } else {
            $_SESSION['UserInfo'] = $userInfo;
            if (trim($data["redirectTo"]) != "") {
                header("Location: " . $data["redirectTo"]);
                exit;
            }
            $msgGlobal = "Login efetuado com sucesso";
            header("Location: conta.php");
            $tipoMsgGlobal = "S";
            $data = array();
        }
    }
}

// Variáveis utilizadas pela vista login.view.php
// $tituloPagina (preenchimento obrigatória) - Titulo da página
// $msgErros (preenchimento obrigatória) - array com as mensagens de erro de validação associado a cada campo
// a chave é igual ao nome do campo
// O array pode estar vazio - não tem nenhuma mensagem de erro
// $data (preenchimento obrigatório) - array com os valores dos campos  
// a chave é igual ao nome do campo
// o campo escondido "operacao" é sempre preenchido
// os restantes campos poderão ficar vazios (não foram ainda preenchidos)
// $dadosSubmetidos (preenchimento obrigatório) - indica se submeteu ou não os dados do formulário
// $msgGlobal (preenchimento opcional) - String com uma mensagem de aviso/erro/sucesso relativa a toda a página
// $tipoMsgGlobal (preenchimento opcional) - Tipo da mensagem global ($msgGlobal):
// A - Aviso
// E - Erro
// I - Informação
// S - Sucesso

require("./application/views/top.template.php");
require("./application/views/loginModel.view.php");
require("./application/views/login.view.php");
require("./application/views/bottom.template.php");
