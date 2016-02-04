<?php
require_once("./application/inc/controllerInit.php");
require_once("./application/models/tshirts_personalizadas.model.php");


$tituloPagina = "Imagem Personalizada";


if (isset($_FILES["nomeCampo"])){
    $imagem = $_FILES["nomeCampo"];
    $nomeOriginal= $_FILES["nomeCampo"]["name"];
    $partes = explode(".", $nomeOriginal);
    $extensao= end($partes);
    $novoID= criarRegistoImagem($nomeOriginal, $extensao);
    $filename= "images/personalizadas/img_".$novoID.".".$extensao; 
    move_uploaded_file($_FILES["nomeCampo"]["tmp_name"],$filename);
    inserirNomeIgm($extensao, $filename);
}

if(isset($_GET['ID'])){
    $id = $_GET['ID'];
}

if (!empty(getInfoTP() && isset($_GET['ID'])) ) {
    $path = getPathImagem($id);

}

if (!empty(getInfoTP())){
    foreach (getInfoTP() as $linha) {
        $idTP = $linha['ID'] + 1;
    }
}





//Lista de produtos Encurtada
$produtosRelacionados = getProdutosRelacionados();


require("./application/views/top.template.php");
require("./application/views/tshirts_personalizadas.view.php");
require("./application/views/bottom.template.php");

