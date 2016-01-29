<?php
require_once("./application/inc/controllerInit.php");

$qtd = 1;
if(isset($_POST['quantidade'])){
    $qtd = $_POST['quantidade'];
}

//exit(var_dump($_POST['quantidade']));

if (isset($_GET["idProduto"])) {
    addToCarrinho($_GET["idProduto"],$qtd);
//    if (isset($_POST['quantidade'])) {
//        $_SESSION['cart'][$_GET["idProduto"]]['quantidade'] = (int)$_POST['quantidade'];
//        $_SESSION['cart'][$_GET["idProduto"]]['qtd'] += $_SESSION['cart'][$_GET["idProduto"]]['quantidade'] -1;
//    }
}

if (isset($_SERVER["HTTP_REFERER"])) {
    if (trim($_SERVER["HTTP_REFERER"]) != "") {
        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit;
    }
}


header('Location: index.php');
