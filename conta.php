<?php
require_once("./application/inc/controllerInit.php");

// Variáveis usadas pelo do template
$tituloPagina = "Minha Conta";

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

require("./application/views/top.template.php");
require("./application/views/conta.view.php");
require("./application/views/bottom.template.php");
