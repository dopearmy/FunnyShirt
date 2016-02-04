<?php
require_once("./application/inc/controllerInit.php");
require_once("./application/models/encomendas.model.php");


$page = "cp_index.php";

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

$totalClientes = count(getInfoClientes());
$totalOrders = count(getOrders());
$totalProdutos = count(getInfoProduto());



// Variáveis usadas pelo do template
$tituloPagina = "Inicio";

require("./application/views/admin/top.template.php");
require("./application/views/admin/cp_index.view.php");
require("./application/views/admin/bottom.template.php");