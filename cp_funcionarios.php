<?php
require_once("./application/models/autenticacao.model.php");
require_once("./application/models/clientes.moldel.php");
session_start();

$page = "cp_clientes.php";
$clientes = array();

//Se não estiver logado redireciona para login.php
if (!isUserAdmin()) {
    if (headers_sent()) {
        die("O redirecionamento falhou. Por favor, clique neste link: <a href=login.php>Login</a>");
    } else {
        $_SESSION["flash_loginMessage"] = "Acesso Negado: Área apenas para os gestores do website!";
        $_SESSION["flash_loginRedirectTo"] = $_SERVER["REQUEST_URI"];
        exit(header("Location: login.php"));
    }
}



$clientes = getInfoClientes();

// Variáveis usadas pelo do template
$tituloPagina = "Clientes";

require("./application/views/admin/top.template.php");
require("./application/views/admin/cp_clientes.view.php");
require("./application/views/admin/bottom.template.php");
