<?php
require_once("./application/inc/controllerInit.php");

// Variáveis usadas pelo do template
$tituloPagina = "Registar Conta";
$data = array();
$infoCliente = array();
$msgErros = array();
$dadosSubmetidos = false;

$IDCliente = 0;
$nome = "";
$preco = 0;
$dataEntrada = 0;

//IDCliente, Nome, NumContribuinte, Telefone, Endereco, DataNascimento, UserID 
$infoCliente = getInfoClientes();

$infoUser = getInfoUser();




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
    $dadosSubmetidos = true;
    $data = $_POST;
    
    $usernamedb = getUserExits($data["username"]);
    
    $msgErrosDadosUser = validarDadosUser($data["username"], $data["email"], 1);
    $msgErrosPasswordUser = validarPassword($data["novaSenha1"], $data["novaSenha2"]);
    $msgErrosPassordUser = validarDadosCliente($data["nome"], $data["contribuinte"], $data["telefone"], $data["endereco"], $data["dataNasc"]);

    if (count($msgErrosDadosUser) > 0) {
        if($usernamedb != 0){
                $msgGlobal = "Este utilizador já existe!";
                $_SESSION["flash_msgGlobal"] = $msgGlobal;
                $tipoMsgGlobal = "E";
                $_SESSION["tipoMsgGlobal"] = $tipoMsgGlobal;
            }
        if (count($msgErrosPasswordUser) > 0) {
            if (count($msgErrosDadosUser) > 0) {
                $msgGlobal = "Existem valores inválidos no formulário";
                $_SESSION["flash_msgGlobal"] = $msgGlobal;
                $tipoMsgGlobal = "E";
                $_SESSION["tipoMsgGlobal"] = $tipoMsgGlobal;
            }
            $msgGlobal = "Existem valores inválidos no formulário";
            $_SESSION["flash_msgGlobal"] = $msgGlobal;
            $tipoMsgGlobal = "E";
            $_SESSION["tipoMsgGlobal"] = $tipoMsgGlobal;
        }
        $msgGlobal = "Existem valores inválidos no formulário";
        $_SESSION["flash_msgGlobal"] = $msgGlobal;
        $tipoMsgGlobal = "E";
        $_SESSION["tipoMsgGlobal"] = $tipoMsgGlobal;
        header("Location: registar.php");

    } else {
        //$id, $nome, $nContribuinte, $telefone, $morada, $dataNasc
        //$dataNasc = date_create($data["dataNasc"]);
        $tipoUser = "C";
        if (criarUser($data["username"], $data["novaSenha1"], $tipoUser, $data["email"], 
                $data["nome"], $data["contribuinte"], $data["telefone"], $data["endereco"], $data["dataNasc"])) {
            $_SESSION["flash_msgGlobal"] = "Os dados foram alterados com sucesso";
            $_SESSION["flash_tipoMsgGlobal"] = "S";
            $tipoMsgGlobal = "S";
            header("Location: login.php");
            exit;
        } else {
            if($usernamedb != 0){
                $msgGlobal = "Este utilizador já existe!";
                $tipoMsgGlobal = "E";
            }  else {
                $msgGlobal = "Houve um problema ao alterar os dados";
                $tipoMsgGlobal = "E";
            }

        }
    }
}



////Alterar Senha
//$msgErros = array();
//$dadosSubmetidos = false;
//if (!empty($_POST)) { // Formulário foi submetido - é um pedido POST
//    $dadosSubmetidos = true;
//    $data = $_POST;
//    $msgErros = validarPassword($data["novaSenha1"], $data["novaSenha2"]);
//    if (count($msgErros) > 0) {
//        $msgGlobal = "Existem valores inválidos no formulário";
//        $_SESSION["flash_msgGlobal"] = $msgGlobal;
//        $tipoMsgGlobal = "A";
//        $_SESSION["tipoMsgGlobal"] = $tipoMsgGlobal;
//    } else {
//        
//    }
//}



require("./application/views/top.template.php");
require("./application/views/registar.view.php");
require("./application/views/bottom.template.php");
