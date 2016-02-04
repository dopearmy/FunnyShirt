<?php
require_once("./application/inc/controllerInit.php");
require_once ("./application/models/tshirts_personalizadas.model.php");

$page = "cp_produtos.php";
$clientes = array();

$data = array();
$infoCliente = array();
$tipoUser = "";

$data = null;

$msgErros = array();
$dadosSubmetidos = false;

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

$produtos = getInfoProduto();
$totalProduto = count($produtos) + 1;



if (empty($_POST)) { // Formulário não foi submetido - é um pedido GET
    if (isset($_SESSION["flash_msgGlobal"])) {
        $msgGlobal = $_SESSION["flash_msgGlobal"];
        unset($_SESSION["flash_msgGlobal"]);
        $tipoMsgGlobal = "S";
    }
}

if (empty($_POST)) { // Formulário não foi submetido - é um pedido GET
    $data = NULL;
    
} else if (!empty($_POST)) { // Formulário foi submetido - é um pedido POST
    $dadosSubmetidos = true;
    $data = $_POST;
    
    if (isset($_FILES["nomeCampo"])){
        $imagem = $_FILES["nomeCampo"];
        $nomeOriginal= $_FILES["nomeCampo"]["name"];
        $partes = explode(".", $nomeOriginal);
        $extensao= end($partes);
        $novoID= $totalProduto;
        $filename= "images/product/t_shirt_".$novoID.".".$extensao; 
        move_uploaded_file($_FILES["nomeCampo"]["tmp_name"],$filename);
    }

    
    //$nome, $nContribuinte, $telefone, $morada, $dataNasc
    $msgErros = validarDadosProdutos($data["nome"], $data["preco"]);
    if (count($msgErros) > 0) {
        $msgGlobal = "Existem valores inválidos no formulário";
        $tipoMsgGlobal = "A";
    } else {
 
        
        //$id, $nome, $nContribuinte, $telefone, $morada, $dataNasc
        if (inserirProduto($data["nome"], $data["preco"])) {
            $_SESSION["flash_msgGlobal"] = "Produto inserido com sucesso";
            $_SESSION["flash_tipoMsgGlobal"] = "S";
            $tipoMsgGlobal = "S";
            header("Location: cp_produtos_inserir.php");
            exit;
        } else {
            $msgGlobal = "Houve um problema ao alterar os dados";
            $tipoMsgGlobal = "E";
        }
    }
}



// Variáveis usadas pelo do template
$tituloPagina = "Editar Produtos";

require("./application/views/admin/top.template.php");
require("./application/views/admin/cp_produtos_inserir.view.php");
require("./application/views/admin/bottom.template.php");
