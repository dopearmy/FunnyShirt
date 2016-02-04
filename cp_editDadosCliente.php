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

//IDCliente, Nome, NumContribuinte, Telefone, Endereco, DataNascimento, UserID 
$infoCliente = getInfoCliente(getUserInfo()["UserID"]);

$infoUser = getInfoUserByID(getUserInfo()["UserID"]);

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

if (empty($_POST)) { // Formulário não foi submetido - é um pedido GET
    $data = NULL;
    if (isset($_GET["ID"])) {
        $data = getInfoCliente(getUserInfo()["UserID"]);
    }
    if ($data == NULL || empty($_GET["ID"])) {
        header("Location: notFound.php");
        exit;
    }
} else if (!empty($_POST)) { // Formulário foi submetido - é um pedido POST
    $IDCliente = (int)$_POST['IDCliente'];
    $dadosSubmetidos = true;
    $data = $_POST;
    var_dump($data);
    //$nome, $nContribuinte, $telefone, $morada, $dataNasc
    $msgErros = validarDadosCliente($data["nome"], $data["contribuinte"], $data["telefone"], $data["endereco"], $data["dataNasc"]);
    if (count($msgErros) > 0) {
        $msgGlobal = "Existem valores inválidos no formulário";
        $_SESSION["flash_msgGlobal"] = $msgGlobal;
        $tipoMsgGlobal = "E";
        $_SESSION["tipoMsgGlobal"] = $tipoMsgGlobal;
    } else {
        //$id, $nome, $nContribuinte, $telefone, $morada, $dataNasc
        $dataNasc = date_create($data["dataNasc"]);
        if (alterarDadosCliente($IDCliente, $data["nome"], $data["contribuinte"], $data["telefone"], $data["endereco"],  date_format($dataNasc, 'Y/m/d'))) {
            $_SESSION["flash_msgGlobal"] = "Os dados foram alterados com sucesso";
            $_SESSION["flash_tipoMsgGlobal"] = "S";
            $tipoMsgGlobal = "S";
            header("Location: cp_clientes_editar.php?ID=".$IDCliente);
            exit;
        } else {
            $msgGlobal = "Houve um problema ao alterar os dados";
            $tipoMsgGlobal = "E";
            header("Location: cp_clientes_editar.php?ID=".$IDCliente);
        }
    }
}




require("./application/views/top.template.php");
require("./application/views/conta_opcoes.view.php");
require("./application/views/bottom.template.php");
